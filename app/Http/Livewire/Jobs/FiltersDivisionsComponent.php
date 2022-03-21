<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Countries\Entities\Country;
use Modules\Countries\Entities\Division;

class FiltersDivisionsComponent extends Component
{
    public int $amount = 5;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected'];

    public function getRowsQueryProperty()
    {
        return Division::query()
                ->whereHas('jobs', fn (Builder $query) => $query->published()->withoutGlobalScope('team'))
                ->withCount(['jobs' => fn($query) => $query->published()->withoutGlobalScope('team')])
                ->orderBy('jobs_count', 'desc');
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->take($this->amount)->get();
    }

    public function updatedSelected()
    {
        $this->emitUp('refreshDivisions', $this->selected);
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
        return view('livewire.jobs.filters-divisions-component', ['rows' => [$this->rows]]);
    }
}
