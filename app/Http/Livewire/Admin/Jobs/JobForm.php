<?php

namespace App\Http\Livewire\Admin\Jobs;

use App\Enums\CategoryType;
use App\Http\Livewire\Admin\Datatable\WithCategories;
use App\Http\Livewire\Admin\Datatable\WithCities;
use App\Http\Livewire\Admin\Datatable\WithCountries;
use App\Http\Livewire\Admin\Datatable\WithDivisions;
use App\Http\Livewire\Admin\Datatable\WithSalaryTypes;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class JobForm extends Component
{
    use WithCategories;

    use WithCountries;

    use WithCities;

    use WithDivisions;

    use WithSalaryTypes;

    public Job $editing;

    public Collection $companies;

    public $avatar;

    public string $categoryType = 'area';

    public Collection $areas;

    public Collection $industries;

    public Collection $jobTypes;

    public Collection $genders;

    public Collection $jobLevels;

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.content' => ['required', 'string', 'min:4'],
            'editing.user_id' => 'required',
            'editing.company_id' => 'required|integer',
            'editing.country_id' => 'required|integer',
            'editing.division_id' => 'nullable|integer',
            'editing.city_id' => 'required|integer',
            'editing.closing_to_for_editing' => 'required',
            'editing.experience' => 'required',
            'editing.negotiable' => 'required|boolean',
            'editing.salary_min' => 'required',
            'editing.salary_max' => 'required',
            'editing.salary_type' => 'required',
        ];
    }


    public function mount()
    {
        $this->companies = Company::teamByUser()->get();

        $this->areas = Category::area()->orderBy('position')->get(['id', 'name', 'icon']);

        $this->industries = Category::industry()->orderBy('position')->get(['id', 'name', 'icon']);

        $this->jobTypes = Category::type(CategoryType::JobType)->orderBy('position')->get(['id', 'name', 'icon']);

        $this->genders = Category::type(CategoryType::Gender)->orderBy('position')->get(['id', 'name', 'icon']);

        $this->jobLevels = Category::type(CategoryType::JobLevel)->orderBy('position')->get(['id', 'name', 'icon']);

        $this->setDefaultCountry();

        $this->setDefaultCategory();

        $this->setDefaultCategoryIndustry();

        $this->setDefaultCategoryJobType();

        $this->setDefaultCategoryGender();

        $this->setDefaultCategoryJobLevels();

        if ($this->editing->country()->value('has_division')) {
            $this->setDefaultDivision();
        } else {
            $this->setDefaultCity();
        }
    }
    public function save()
    {
        $this->validate();

        $this->editing->save();

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->notify('The Job has been successfully updated');
    }

    public function render()
    {
        return view('livewire.admin.jobs.job-form');
    }
}
