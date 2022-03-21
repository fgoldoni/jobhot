<?php
namespace App\Http\Livewire\Jobs;

use App\Models\Company;
use App\Models\Job;
use Livewire\Component;
use Modules\Countries\Entities\Country;

class SearchBar extends Component
{

    public string $searchJob = '';

    public int|null $selectedJob = null;

    public bool $showJobDropdown = false;

    public $jobs;

    public function mount()
    {
        $this->jobs = [];
    }

    public function updatedSearchJob()
    {
        $this->jobs = Job::withoutGlobalScope('team')
            ->with(['categories'])
            ->search($this->searchJob)
            ->take(5)
            ->get()->sortBy('name')->toArray();

        $companies = Company::withoutGlobalScope('team')
            ->with(['categories'])
            ->search($this->searchJob)
            ->take(5)
            ->get()->sortBy('name')->toArray();

        $this->jobs = array_merge($this->jobs, $companies);

        $this->showJobDropdown = true;
    }

    public function render()
    {
        return view('livewire.jobs.search-bar');
    }
}
