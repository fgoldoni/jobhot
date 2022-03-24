<?php
namespace App\Http\Livewire\Jobs;

use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FiltersCitiesComponent extends Component
{
    use WithSorting;

    public int $amount = 5;

    public int $type = 0;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected', 'filtersChangeCities'];

    public function getRowsQueryProperty()
    {
        return Job::query()
            ->published()
            ->select('city_id', DB::raw('COUNT(city_id) as count'))
            ->with('city:id,name')
            ->groupBy('city_id')
            ->orderBy('count', 'desc');
    }

    public function getRowsProperty()
    {
        return Cache::remember('filters-cities-page-' . $this->amount, 60 * 60, fn () => $this->rowsQuery->take($this->amount)->get());
    }

    public function updatedSelected()
    {
        $this->emitUp('refreshCities', $this->selected);
    }

    public function refreshFiltersSelected()
    {
        $this->reset('selected');
    }

    public function filtersChangeCities(array $cities)
    {
        $this->selected = $cities;
    }

    public function load()
    {
        $this->amount += 5;
    }

    public function render()
    {
        return view('livewire.jobs.filters-cities-component', ['rows' => $this->rows]);
    }
}
