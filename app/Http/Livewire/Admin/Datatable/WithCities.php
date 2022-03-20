<?php
namespace App\Http\Livewire\Admin\Datatable;

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
        $this->editing->load('country');

        if (is_null($this->editing->country_id) || $this->editing->country->has_division || strlen($this->searchCity) < 1) {
            $this->cities = collect();

            $this->showCityDropdown = false;
            return;
        }

        $this->cities = $this->editing->country->cities()->search($this->searchCity)->orderBy('name')->get();

        $this->showCityDropdown = true;
    }

    public function setDefaultCity()
    {
        $this->showCityField = true;
        $this->searchCity = $this->editing->city ? $this->editing->city->name : '';
    }
}
