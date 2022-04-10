<?php
namespace App\Http\Livewire\Admin\Datatable;

use App\Enums\CategoryType;
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

    public ?int $jobType = null;

    public ?int $gender = null;

    public ?int $jobLevel = null;

    public function mountWithCategories()
    {
        $this->selectedItem = $this->loadCategories()->first()->id;
    }

    private function setDefaultCategory()
    {
        $this->selectedItem = $this->defaultCategory();
    }

    private function setDefaultCategoryJobType()
    {
        $this->jobType = ($attachCategory = $this->editing->categories()->type(CategoryType::JobType)->first())
            ? $attachCategory->id
            : Category::query()->type(CategoryType::JobType)->orderBy('position')->first()->id;
    }

    private function setDefaultCategoryGender()
    {
        $this->gender = ($attachCategory = $this->editing->categories()->type(CategoryType::Gender)->first())
            ? $attachCategory->id
            : Category::query()->type(CategoryType::Gender)->orderBy('position')->first()->id;
    }

    private function setDefaultCategoryJobLevels()
    {
        $this->jobLevel = ($attachCategory = $this->editing->categories()->type(CategoryType::JobLevel)->first())
            ? $attachCategory->id
            : Category::query()->type(CategoryType::JobLevel)->orderBy('position')->first()->id;
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
