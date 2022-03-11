<?php
namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Admin\Datatable\WithBulkActions;
use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesComponent extends Component
{
    use WithSorting;
    use WithBulkActions;
    use WithCachedRows;
    use WithFileUploads;

    public array $filters = [
        'search' => ''
    ];

    public function updateTaskOrder($list)
    {
        foreach ($list as $item) {
            Category::find($item['value'])->update(['position' => $item['order']]);
        }
    }

    public function getRowsQueryProperty()
    {
        return Category::query()
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search))
            ->orderBy('position', 'asc');
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->rowsQuery->get());
    }

    public function render()
    {
        return view('livewire.admin.categories-component', ['rows' => $this->rows]);
    }
}
