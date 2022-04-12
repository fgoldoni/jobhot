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

    public ?int $industry = null;

    public ?int $jobType = null;

    public ?int $gender = null;

    public ?int $jobLevel = null;

    public ?int $responsibility = null;

    public ?int $skill = null;

    public ?int $benefit = null;

    public function mountWithCategories()
    {
    }

    private function setDefaultCategory()
    {
        $this->selectedItem = ($attachCategory = $this->editing->categories()->type(CategoryType::Area)->first())
            ? $attachCategory->id
            : Category::query()->type(CategoryType::Area)->orderBy('position')->first()->id;
    }

    private function setDefaultCategoryIndustry()
    {
        $this->industry = ($attachCategory = $this->editing->categories()->type(CategoryType::Industry)->first())
            ? $attachCategory->id
            : Category::query()->type(CategoryType::Industry)->orderBy('position')->first()->id;
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

    private function setDefaultCategoryResponsibilities()
    {
        $this->responsibility = Category::query()->type(CategoryType::Responsibility)->orderBy('position')->first()->id;
    }

    private function setDefaultCategorySkills()
    {
        $this->skill = Category::query()->type(CategoryType::Skill)->orderBy('position')->first()->id;
    }

    private function setDefaultCategoryBenefits()
    {
        $this->benefit = Category::query()->type(CategoryType::Benefit)->orderBy('position')->first()->id;
    }

    private function loadCategories(): Collection|array
    {
        return Category::query()->area()->orderBy('position')->get(['id', 'name', 'icon']);
    }
}
