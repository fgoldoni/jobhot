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

    protected ?Collection $attachCategories = null;

    public function mountWithCategories()
    {
        $this->setDefaultCategory();
    }

    public function initCategories()
    {
        $this->attachCategories = $this->editing->categories()->get();

        $this->setDefaultCategoryIndustry();

        $this->setDefaultCategoryJobType();

        $this->setDefaultCategoryGender();

        $this->setDefaultCategoryJobLevels();

        $this->setDefaultCategoryResponsibilities();

        $this->setDefaultCategorySkills();

        $this->setDefaultCategoryBenefits();
    }

    private function setDefaultCategory()
    {
        $type = $this->categoryType === 'area' ? CategoryType::Area : CategoryType::Industry;

        $attachCategory = $this->editing->categories()->type($type)->first();

        $this->selectedItem = $attachCategory
            ? $attachCategory->id
            : Category::query()->type($type)->positionAsc()->get()->first()->id;
    }

    private function setDefaultCategoryIndustry()
    {
        $this->industry = ($attachCategory = $this->attachCategories->industries()->first())
            ? $attachCategory->id
            : $this->categories->industries()->first()->id;
    }

    private function setDefaultCategoryJobType()
    {
        $this->jobType = ($attachCategory = $this->attachCategories->jobTypes()->first())
            ? $attachCategory->id
            : $this->categories->jobTypes()->first()->id;
    }

    private function setDefaultCategoryGender()
    {
        $this->gender = ($attachCategory = $this->attachCategories->genders()->first())
            ? $attachCategory->id
            : $this->categories->genders()->first()->id;
    }

    private function setDefaultCategoryJobLevels()
    {
        $this->jobLevel = ($attachCategory = $this->attachCategories->jobLevels()->first())
            ? $attachCategory->id
            : $this->categories->jobLevels()->first()->id;
    }

    private function setDefaultCategoryResponsibilities()
    {
        $this->responsibility = $this->categories->responsibilities()->first()->id;
    }

    private function setDefaultCategorySkills()
    {
        $this->skill = $this->categories->skills()->first()->id;
    }

    private function setDefaultCategoryBenefits()
    {
        $this->benefit = $this->categories->benefits()->first()->id;
    }
}
