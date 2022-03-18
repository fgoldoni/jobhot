<?php


namespace App\Http\Livewire\Admin\Datatable;

use Modules\Countries\Entities\City;

/**
 * Class WithCities
 *
 * @package \App\Http\Livewire\Admin\Datatable
 */
trait WithCities
{
    public string $searchCity = '';

    public bool $showCityDropdown = false;

    public $cities;

    public function mountWithCities()
    {
        $this->cities = collect();
    }

    public function updatedSearchCity()
    {
        if (is_null($this->editing->country_id) || strlen($this->searchCity) < 1) {
            $this->cities = collect();
            $this->showCityDropdown = false;
            return;
        }

        $this->cities =  City::search($this->searchCity)->where('country_id', $this->editing->country_id)->orderBy('name')->get();

        $this->showCityDropdown = true;

    }

    public function setDefaultCity()
    {
        $this->searchCity = $this->editing->city ? $this->editing->city->name : '';
    }
}
