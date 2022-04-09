<?php
namespace App\Http\Livewire\Jobs;

use App\Models\Company;
use App\Models\Job;
use Livewire\Component;

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
        $this->jobs = Job::query()
            ->with(['categories:id,name', 'country:id,name,emoji', 'city:id,name', 'division:id,name'])
            ->search($this->searchJob)
            ->take(10)
            ->get()->sortBy('name');

        $this->showJobDropdown = true;
    }

    public function updatedSelectedJob()
    {
        if ($model = Job::search($this->searchJob)->find($this->selectedJob)) {
            return redirect()->route('jobs.job', ['slug' => $model->slug]);
        } else {
            if ($model = Company::search($this->searchJob)->find($this->selectedJob)) {
                return redirect()->route('companies.company', ['slug' => $model->slug]);
            }
        }
    }

    public function render()
    {
        return view('livewire.jobs.search-bar');
    }
}
