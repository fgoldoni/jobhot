<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompaniesDatatable extends Component
{
    use WithSorting;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;

    public array $filters = [
        'search' => ''
    ];

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
        return view('livewire.admin.companies-datatable', ['rows' => $this->rows]);
    }
}
