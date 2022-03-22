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
            ->with(['categories:id,name'])
            ->search($this->searchJob)
            ->take(5)
            ->get(['id', 'name', 'avatar_path', 'live_at'])->sortBy('name')->toArray();

        $companies = Company::query()
            ->with(['categories:id,name'])
            ->search($this->searchJob)
            ->take(5)
            ->get(['id', 'name', 'avatar_path', 'live_at'])->sortBy('name')->toArray();

        $this->jobs = array_merge($this->jobs, $companies);

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
