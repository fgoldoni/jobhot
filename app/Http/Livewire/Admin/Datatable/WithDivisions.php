<?php


namespace App\Http\Livewire\Admin\Datatable;

use Modules\Countries\Entities\Division;

/**
 * Class WithCities
 *
 * @package \App\Http\Livewire\Admin\Datatable
 */
trait WithDivisions
{
    public string $searchDivision = '';

    public bool $showDivisionDropdown = false;

    public $divisions;

    public function  mountWithDivisions()
    {
        $this->divisions = collect();
    }

    public function updatedSearchDivision()
    {
        $this->editing->load('country');


        if (is_null($this->editing->country_id) || !($this->editing->country->has_division) || (strlen($this->searchDivision) < 1)) {
            $this->divisions = collect();

            $this->showDivisionDropdown = false;
            return;
        }

        $this->showDivisionDropdown = true;

        $this->divisions =  $this->editing->country->divisions()->search($this->searchDivision)->orderBy('name')->get();

    }

    public function setDefaultDivision()
    {
        $this->showCityField = false;
        $this->searchDivision = $this->editing->division ? $this->editing->division->name : '';
    }
}
