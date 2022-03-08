<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Category;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\Integer;

class CompaniesDatatable extends Component
{
    use WithSorting;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;

    public bool $showDeleteModal = false;

    public bool $showEditModal = false;

    public bool $showFilters = false;

    public bool $showEditor = false;

    public  $selectedItem ;

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
        ];
    }

    public function mount() {
        $this->categories = $this->loadCategories();
        $this->editing = $this->makeBlankCompany();
        $this->selectedItem = $this->categories->random()->id;
    }

    public function edit(Company $company)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($company)) $this->editing = $company;

        $this->showEditModal = true;
    }

    public function save()
    {
       sleep(3);
    }

    public function getRowsQueryProperty()
    {
        return Company::query()
            ->with(['user:id,name'])
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search));
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->rowsQuery->paginate(5));
    }

    public function render()
    {
        return view('livewire.admin.companies-datatable', [
            'rows' => $this->rows,
            'categories' => $this->categories
        ]);
    }

    private function makeBlankCompany()
    {
        return Company::make();
    }

    private function loadCategories()
    {
       return Category::get(['id', 'name', 'icon']);
    }
}
