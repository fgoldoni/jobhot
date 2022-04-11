<?php
namespace App\Http\Livewire\Admin\Jobs;

use App\Enums\CategoryType;
use App\Enums\JobState;
use App\Http\Livewire\Admin\Datatable\WithCategories;
use App\Http\Livewire\Admin\Datatable\WithCities;
use App\Http\Livewire\Admin\Datatable\WithCountries;
use App\Http\Livewire\Admin\Datatable\WithDivisions;
use App\Http\Livewire\Admin\Datatable\WithSalaryTypes;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as StatesCollection;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobForm extends Component
{
    use WithCategories;

    use WithCountries;

    use WithCities;

    use WithFileUploads;

    use WithDivisions;

    use WithSalaryTypes;

    public Job $editing;

    public Collection $companies;

    public StatesCollection $states;

    public $avatar;

    public string $categoryType = 'area';

    public Collection $areas;

    public Collection $industries;

    public Collection $responsibilities;

    public Collection $skills;

    public Collection $jobTypes;

    public Collection $genders;

    public Collection $jobLevels;

    public int $selectedState = 1;

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
            'editing.iframe' => 'required',
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

        $this->responsibilities = Category::type(CategoryType::Responsibility)->orderBy('position')->get(['id', 'name', 'icon']);

        $this->skills = Category::type(CategoryType::Skill)->orderBy('position')->get(['id', 'name', 'icon']);

        $this->setDefaultCountry();

        $this->setDefaultCategory();

        $this->setDefaultCategoryIndustry();

        $this->setDefaultCategoryJobType();

        $this->setDefaultCategoryGender();

        $this->setDefaultCategoryJobLevels();

        $this->setDefaultCategoryResponsibilities();

        $this->setDefaultCategorySkills();

        if ($this->editing->country()->value('has_division')) {
            $this->setDefaultDivision();
        } else {
            $this->setDefaultCity();
        }

        $this->states = $this->getStates();

        $this->selectedState = $this->findStateBy('name', ucfirst($this->editing->state->value))['id'];
    }

    public function saveJobDetails()
    {
        $this->editing->state = strtolower($this->findStateBy('id', $this->selectedState)['name']);

        $validatedData = $this->validate([
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.content' => ['required', 'string', 'min:4'],
            'editing.closing_to_for_editing' => 'required',
            'editing.experience' => 'required',
            'editing.salary_min' => 'required',
            'editing.salary_max' => 'required',
            'editing.salary_type' => 'required',
            'editing.state' => 'required',
        ]);

        $this->editing->update($validatedData['editing']);

        if (isset($this->avatar)) {
            $this->editing->updateAvatar($this->avatar);
        }

        $this->notify('The Job has been successfully updated');
    }

    public function saveCompany()
    {
        $validatedData = $this->validate([
            'editing.company_id' => 'required|integer',
        ]);

        $this->editing->update($validatedData['editing']);

        $industries = $this->editing->categories()->industry()->get();

        $this->editing->detachCategories($industries);

        $this->editing->syncCategories([$this->industry], false);

        $this->notify('The Job has been successfully updated');
    }

    public function saveJobLocation()
    {
        $validatedData = $this->validate([
            'editing.country_id' => 'required|integer',
            'editing.division_id' => 'nullable|integer',
            'editing.city_id' => 'nullable|integer',
            'editing.iframe' => 'required',
        ]);

        $this->editing->update($validatedData['editing']);

        $this->notify('The Job Location has been successfully updated');
    }

    public function saveJobAttribute()
    {
        $validatedData = $this->validate([
            'selectedItem' => 'required|integer',
            'jobType' => 'required|integer',
            'gender' => 'required|integer',
            'jobLevel' => 'required|integer',
        ]);

        $detachCategories = $this->editing->categories()->whereNot('type', CategoryType::Industry)->get();

        $this->editing->detachCategories($detachCategories);

        $this->editing->syncCategories(Arr::flatten($validatedData), false);

        $this->notify('The Job Attribute has been successfully updated');
    }

    public function saveJobResponsibility()
    {
        $validatedData = $this->validate([
            'responsibility' => 'required|integer',
        ]);

        $this->editing->syncCategories([$validatedData['responsibility']], false);

        $this->editing->load('categories');

        $this->notify('The Job Attribute has been successfully updated');
    }

    public function saveJobSkill()
    {
        $validatedData = $this->validate([
            'skill' => 'required|integer',
        ]);

        $this->editing->syncCategories([$validatedData['skill']], false);

        $this->editing->load('categories');

        $this->notify('The Job Attribute has been successfully updated');
    }

    public function removeJobCategory(int $responsibilityId)
    {
        $this->editing->detachCategories([$responsibilityId]);

        $this->editing->load('categories');

        $this->notify('The Job Attribute has been successfully updated');
    }

    public function render()
    {
        return view('livewire.admin.jobs.job-form');
    }

    private function findStateBy(string $key, $value): array
    {
        return $this->states->filter(fn ($s) => $s[$key] === $value)->first();
    }

    private function getStates(): StatesCollection
    {
        return collect([
            [
                'id' => 1,
                'name' => ucfirst((JobState::Draft)->value),
            ],
            [
                'id' => 2,
                'name' => ucfirst((JobState::Published)->value),
            ],
            [
                'id' => 3,
                'name' => ucfirst((JobState::Archived)->value),
            ],
            [
                'id' => 4,
                'name' => ucfirst((JobState::Hold)->value),
            ]
        ]);
    }
}
