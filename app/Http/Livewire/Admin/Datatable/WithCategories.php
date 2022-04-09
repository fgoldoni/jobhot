<?php
namespace App\Http\Livewire\Admin\Datatable;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class WithCategories
 *
 * @package \App\Http\Livewire\Admin\Datatable
 */
trait WithCategories
{
    public ?int $selectedItem = null;

    public function mountWithCategories()
    {
        $this->selectedItem = $this->loadCategories()->first()->id;
    }

    private function setDefaultCategory()
    {
        $this->selectedItem = $this->defaultCategory();
    }

    private function defaultCategory()
    {
        return ($attachCategory = $this->editing->categories->first()) ? $attachCategory->id : $this->loadCategories()->first()->id;
    }

    private function loadCategories(): Collection|array
    {
        return Category::query()->area()->orderBy('position')->get(['id', 'name', 'icon']);
    }
}
