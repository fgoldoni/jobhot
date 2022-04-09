<?php
namespace App\Http\Livewire\Admin;

use App\Enums\JobState;
use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithCategories;
use App\Http\Livewire\Admin\Datatable\WithCities;
use App\Http\Livewire\Admin\Datatable\WithCompanies;
use App\Http\Livewire\Admin\Datatable\WithCountries;
use App\Http\Livewire\Admin\Datatable\WithDivisions;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Job;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as StatesCollection;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobsDatatable extends Component
{
    use WithSorting;
    use WithPerPagePagination;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;
    use WithCategories;

    use WithCompanies;

    use WithCountries;

    use WithCities;

    use WithDivisions;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public bool $showEditor = true;

    public int $selectedState = 1;

    public string $categoryType = 'area';

    public StatesCollection $states;

    public $avatar;

    public Job $editing;

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
            'editing.user_id' => 'required',
            'editing.company_id' => 'required|integer',
            'editing.country_id' => 'required|integer',
            'editing.division_id' => 'nullable|integer',
            'editing.city_id' => 'nullable|integer',
            'selectedItem' => 'required|integer|exists:categories,id',
            'selectedState' => 'required',
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    public function mount(AuthManager $auth)
    {
        $this->editing = $this->makeBlankJob();

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
            $this->editing = $this->makeBlankJob();
            $this->avatar = null;
        }

        $this->showEditModal = true;
    }

    public function edit(Job $job)
    {
        $this->useCachedRows();

        $this->resetValidation();

        if ($this->editing->isNot($job)) {
            $this->editing = $job->load(['company', 'country', 'city']);

            $this->avatar = null;

            $this->setDefaultCountry();

            if ($this->editing->country()->value('has_division')) {
                $this->setDefaultDivision();
            } else {
                $this->setDefaultCity();
            }

            $this->setDefaultCategory();

            $this->setDefaultCompany();

            $this->selectedState = strtolower($this->findIndexStateBy('name', $job->state->value));
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

        $this->editing->syncCategories([$this->selectedItem]);

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
        $query = Job::query()
            ->with(['user:id,name', 'company:id,name', 'categories:id,name,icon', 'country:id,name', 'city:id,name', 'division:id,name'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))
            ->when($this->filters['state'], fn ($query, $state) => $query->where('state', $state))
            ->when($this->filters['date-min'], fn ($query, $date) => $query->where('created_at', '>=', Carbon::parse($date)))
            ->when($this->filters['date-max'], fn ($query, $date) => $query->where('created_at', '<=', Carbon::parse($date)))
            ->where('team_id', auth()->user()->currentTeam->getKey());

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    private function makeBlankJob(): Model|Job
    {
        return Job::make(['user_id' => auth()->user()->id]);
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
                'name' => ucfirst((JobState::Draft)->value),
            ],
            [
                'id' => 1,
                'name' => ucfirst((JobState::Published)->value),
            ],
            [
                'id' => 2,
                'name' => ucfirst((JobState::Archived)->value),
            ],
            [
                'id' => 3,
                'name' => ucfirst((JobState::Hold)->value),
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.admin.jobs-datatable', [
            'rows' => $this->rows,
            'categories' => $this->loadCategories()
        ]);
    }
}
