<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Modules\Countries\Entities\Country;

class SearchBar extends Component
{
    public string $search = '';

    public int|null $selected = null;

    public bool $showDropdown = false;

    public $results;


    public function mount()
    {
        $this->results = collect();
    }
    public function updatedSearch()
    {
       $this->results =  Country::search($this->search)->orderBy('name')->get();
       $this->showDropdown = true;
    }



    public function render()
    {
        return view('livewire.home.search-bar');
    }
}
