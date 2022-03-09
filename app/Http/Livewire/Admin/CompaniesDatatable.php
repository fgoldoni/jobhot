<?php

namespace App\Http\Livewire\Admin;

use App\Enums\CategoryType;
use App\Enums\CompanyState;
use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as StatesCollection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\Integer;

class CompaniesDatatable extends Component
{
    use WithSorting;
    use WithPerPagePagination;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public bool $showEditor = false;

    public  ?int $selectedItem = null;

    public  int $selectedState = 1;

    public StatesCollection $states;

    public $categories;

    public $avatar;

    public Company $editing;

    public array $filters = [
        'search' => ''
    ];

    public function rules(): array
    {
        return [
            'editing.id' => 'required',
            'editing.name' => 'required',
            'editing.content' => 'required',
            'editing.phone' => 'required',
            'editing.email' => 'required',
            'selectedItem' => 'required',
            'selectedState' => 'required',
        ];
    }

    public function mount()
    {

        $this->categories = $this->loadCategories();

        $this->editing = $this->makeBlankCompany();

        $this->selectedItem = $this->categories->first()->id;

        $this->states = collect([
            [
                'id' => 0,
                'name' => CompanyState::Draft,
            ],
            [
                'id' => 1,
                'name' => CompanyState::Published,
            ],
            [
                'id' => 2,
                'name' => CompanyState::Archived,
            ],
            [
                'id' => 3,
                'name' => CompanyState::Hold,
            ]
        ]);
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = ! $this->showFilters;
    }

    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = $this->makeBlankCompany();

        $this->showEditModal = true;
    }


    public function edit(Company $company)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($company)) {

            $this->editing = $company;

            $this->avatar = null;

            $this->selectedItem = ($attachCategory = $this->editing->categories->first()) ? $attachCategory->id : $this->categories->first()->id;

            $this->selectedState = $this->findIndexStateBy('name', $company->state->value);
        }

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->state = $this->findStateBy('id', $this->selectedState)['name'];

        $this->editing->save();

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->showEditModal = false;

        $this->editing->syncCategories([$this->selectedItem]);

        $this->notify('The user has been successfully updated');
    }

    public function getRowsQueryProperty()
    {
        return Company::query()
            ->with(['user:id,name', 'categories:id,name'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search));
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    public function render()
    {
        return view('livewire.admin.companies-datatable', [
            'rows' => $this->rows,
            'categories' => $this->loadCategories()
        ]);
    }

    private function makeBlankCompany(): Model|Company
    {
        return Company::make();
    }

    private function loadCategories(): Collection|array
    {
       $this->useCachedRows();
       return $this->cache(fn () => Category::query()->industry()->orderBy('position')->get(['id', 'name', 'icon']), 'categories');
    }

    private function findStateBy(string $key, $value): array
    {
        return $this->states->filter(fn($s) => $s[$key] === $value)->first();
    }

    private function findIndexStateBy(string $key, $value)
    {
        return $this->states->search(fn($s) => $s[$key] === $value);
    }
}
