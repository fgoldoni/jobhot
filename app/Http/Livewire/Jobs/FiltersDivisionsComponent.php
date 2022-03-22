<?php
namespace App\Http\Livewire\Jobs;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Countries\Entities\Division;

class FiltersDivisionsComponent extends Component
{
    public int $amount = 5;

    public int $type = 0;

    public array $selected = [];

    protected $listeners = ['refreshFiltersSelected'];

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

    public function getRowsQueryProperty()
    {
        return Division::query()
            ->whereHas('jobs', fn (Builder $query) => $query->published())
            ->withCount(['jobs' => fn ($query) => $query->published()])
            ->orderBy('jobs_count', 'desc');
    }

    public function getRowsProperty()
    {
        return Cache::remember('filters-divisions-page-' . $this->amount, 60 * 60, fn () => $this->rowsQuery->take($this->amount)->get());
    }

    public function render()
    {
        return view('livewire.jobs.filters-divisions-component', ['rows' => [$this->rows]]);
    }
}
