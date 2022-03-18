<?php

namespace App\Http\Livewire\Admin\Datatable;

use Modules\Countries\Entities\Country;

trait WithCountries
{
    public string $searchCountry = '';

    public bool $showCountryDropdown = false;

    public $countries;

    public function mountWithCountries()
    {
        $this->countries = collect();
    }

    public function updatedSearchCountry()
    {
        $this->countries =  Country::search($this->searchCountry)->orderBy('name')->get();
        $this->editing->city_id = null;
        $this->showCountryDropdown = true;
    }

    public function updated($value)
    {
        if ($value === 'editing.country_id') {
            $this->dispatchBrowserEvent('reset-cities');
        }
    }

    public function setDefaultCountry()
    {
        $this->searchCountry = $this->editing->country ? $this->editing->country->name : '';
    }
}
