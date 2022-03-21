<?php

namespace App\Http\Livewire\Jobs;

use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FiltersCitiesComponent extends Component
{
    use WithSorting;

    public int $amount = 5;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected'];

    public function getRowsQueryProperty()
    {
        return Job::published()
            ->withoutGlobalScope('team')
            ->select('city_id', DB::raw('COUNT(city_id) as count'))
            ->with('city:id,name')
            ->groupBy('city_id')
            ->orderBy('count', 'desc');
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->take($this->amount)->get();
    }

    public function updatedSelected()
    {
        $this->emitUp('refreshCities', $this->selected);
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
        return view('livewire.jobs.filters-cities-component', ['rows' => $this->rows]);
    }
}
