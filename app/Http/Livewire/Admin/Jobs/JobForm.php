<?php

namespace App\Http\Livewire\Admin\Jobs;

use App\Http\Livewire\Admin\Datatable\WithCountries;
use App\Http\Livewire\Admin\Datatable\WithSalaryTypes;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class JobForm extends Component
{
    use WithCountries;

    use WithSalaryTypes;

    public Job $editing;

    public Collection $companies;

    public $avatar;

    public function rules(): array
    {
        return [
            'editing.name' => ['required', 'string', 'max:255'],
            'editing.content' => ['required', 'string', 'min:4'],
            'editing.user_id' => 'required',
            'editing.company_id' => 'required|integer',
            'editing.country_id' => 'required|integer',
            'editing.division_id' => 'nullable|integer',
            'editing.city_id' => 'nullable|integer',
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
