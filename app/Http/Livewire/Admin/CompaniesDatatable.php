<?php
namespace App\Http\Livewire\Admin;

use App\Enums\CompanyState;
use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithCategories;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Company;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as StatesCollection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompaniesDatatable extends Component
{
    use WithSorting;

    use WithPerPagePagination;

    use WithBulkActions;

    use WithCachedRows;

    use WithFileUploads;

    use WithCategories;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public bool $showEditor = false;

    public int $selectedState = 1;

    public StatesCollection $states;

    public string $categoryType = 'industry';

    public $avatar;

    public Company $editing;

    protected $queryString = ['sorts'];

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public array $filters = [
        'search' => '',
        'state' => null,
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.content' => ['required', 'string', 'min:4'],
            'editing.phone' => 'required',
            'editing.email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->editing->id)],
            'editing.user_id' => 'required',
            'selectedItem' => 'required|integer|exists:categories,id',
            'selectedState' => 'required',
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function mount(AuthManager $auth)
    {
        $this->editing = $this->makeBlankCompany();

        $this->states = $this->getStates();
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
        }, 'transactions.csv');
    }

    public function create()
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->getKey()) {
            $this->editing = $this->makeBlankCompany();
            $this->avatar = null;
        }

        $this->showEditModal = true;
    }

    public function edit(Company $company)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($company)) {
            $this->editing = $company;

            $this->avatar = null;

            $this->setDefaultCategory();

            $this->selectedState = strtolower($this->findIndexStateBy('name', $company->state->value));
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->state = strtolower($this->findStateBy('id', $this->selectedState)['name']);

        $this->editing->save();

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->showEditModal = false;

        $this->notify('The company has been successfully updated');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('You\'ve deleted ' . $deleteCount . ' companies');
    }

    public function getRowsQueryProperty()
    {
        $query = Company::query()
            ->with(['user:id,name', 'team:id,name', 'jobs:id,company_id'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))
            ->when($this->filters['state'], fn ($query, $state) => $query->where('state', $state))
            ->when($this->filters['date-min'], fn ($query, $date) => $query->where('created_at', '>=', Carbon::parse($date)))
            ->when($this->filters['date-max'], fn ($query, $date) => $query->where('created_at', '<=', Carbon::parse($date)))
            ->inTeam();

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    private function makeBlankCompany(): Model|Company
    {
        return Company::make(['user_id' => auth()->user()->id]);
    }

    private function findStateBy(string $key, $value): array
    {
        return $this->states->filter(fn ($s) => $s[$key] === $value)->first();
    }

    private function findIndexStateBy(string $key, $value)
    {
        $value = is_string($value) ? ucfirst($value) : $value;

        return $this->states->search(fn ($s) => $s[$key] === $value);
    }

    private function getStates(): StatesCollection
    {
        return collect([
            [
                'id' => 0,
                'name' => ucfirst((CompanyState::Draft)->value),
            ],
            [
                'id' => 1,
                'name' => ucfirst((CompanyState::Published)->value),
            ],
            [
                'id' => 2,
                'name' => ucfirst((CompanyState::Archived)->value),
            ],
            [
                'id' => 3,
                'name' => ucfirst((CompanyState::Hold)->value),
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.admin.companies-datatable', [
            'rows' => $this->rows
        ]);
    }
}
