<?php
namespace App\Http\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FiltersCountriesComponent extends Component
{
    public int $amount = 5;

    public int $type = 0;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected', 'refreshFiltersCountries'];

    public function updatedSelected()
    {
        $this->emitUp('refreshCountries', $this->selected);
    }

    public function refreshFiltersSelected()
    {
        $this->reset('selected');
    }

    public function refreshFiltersCountries(array $countries)
    {
        $this->selected = $countries;
    }

    public function load()
    {
        $this->amount += 5;
    }

    public function getRowsQueryProperty()
    {
        return Job::query()
            ->published()
            ->select('country_id', DB::raw('COUNT(country_id) as count'))
            ->with('country:id,name,emoji')
            ->groupBy('country_id')
            ->orderBy('count', 'desc');
    }

    public function getRowsProperty()
    {
        return Cache::remember('filters-countries-page-' . $this->amount, 60 * 60, fn () => $this->rowsQuery->take($this->amount)->get());
    }

    public function render()
    {
        $displayCountries = $this->rows;

        session()->put('displayCountries', $displayCountries);

        return view('livewire.jobs.filters-countries-component', ['rows' => [$displayCountries]]);
    }
}
