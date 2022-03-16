<?php
namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Countries\Entities\Division;

class DivisionsDatatable extends Component
{
    use WithSorting;
    use WithPerPagePagination;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public Division $editing;

    protected $queryString = ['sorts'];

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public array $filters = [
        'search' => '',
        'continent_id' => null,
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.online' => 'required',
        ];
    }

    public function mount(AuthManager $auth)
    {
        $this->editing = $this->makeBlankDivision();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }

    public function resetFilters()
    {
        $this->resetPage();
        $this->reset('filters', 'sorts');
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'countries.csv');
    }

    public function create()
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankDivision();
        }

        $this->showEditModal = true;
    }

    public function edit(Division $country)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($country)) {
            $this->editing = $country;
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;

        $this->notify('The country has been successfully updated');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        //$this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted ' . $deleteCount . ' companies');
    }

    public function getRowsQueryProperty()
    {
        $query = Division::query()
            ->with(['country:id,name,emoji', 'cities'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))
            ->when($this->filters['continent_id'], fn ($query, $state) => $query->where('continent_id', $state));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    private function makeBlankDivision(): Model|Division
    {
        return Division::make();
    }

    public function render()
    {
        return view('livewire.admin.divisions-datatable', [
            'rows' => $this->rows
        ]);
    }
}
