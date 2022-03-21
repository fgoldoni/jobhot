<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Countries\Entities\Country;

class FiltersCountriesComponent extends Component
{
    public int $amount = 5;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected'];

    public function getRowsQueryProperty()
    {
        return Job::published()
            ->withoutGlobalScope('team')
            ->select('country_id', DB::raw('COUNT(country_id) as count'))
            ->with('country:id,name')
            ->groupBy('country_id')
            ->orderBy('count', 'desc');
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->take($this->amount)->get();
    }

    public function updatedSelected()
    {
        $this->emitUp('refreshCountries', $this->selected);
    }

    public function refreshFiltersSelected()
    {
        $this->reset('selected');
    }

    public function load()
    {
        $this->amount += 5;
    }

    public function render()
    {
        return view('livewire.jobs.filters-countries-component', ['rows' => [$this->rows]]);
    }
}
