<?php

namespace App\Http\Livewire\Home;

use App\Models\Job;
use Livewire\Component;
use Modules\Countries\Entities\Country;

class SearchBar extends Component
{
    public string $searchCountry = '';

    public int|null $selectedCountry = null;

    public bool $showCountryDropdown = false;

    public string $searchJob = '';

    public int|null $selectedJob = null;

    public bool $showJobDropdown = false;

    public $countries;

    public $jobs;


    public function mount()
    {
        $this->countries = collect();

        $this->jobs = collect();
    }

    public function updatedSearchCountry()
    {
       $this->countries =  Country::search($this->searchCountry)->orderBy('name')->get();
       $this->showCountryDropdown = true;
    }

    public function updatedSearchJob()
    {
       $this->jobs =  Job::withoutGlobalScope('team')
           ->with(['company', 'categories'])
           ->search($this->searchJob)
           ->orderBy('name')
           ->where('team_id', auth()->user()->currentTeam->getKey())
           ->take(5)
           ->get();
       $this->showJobDropdown = true;
    }



    public function render()
    {
        return view('livewire.home.search-bar');
    }
}
