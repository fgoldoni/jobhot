<?php
namespace App\Http\Livewire\Jobs;

use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class JobsComponent extends Component
{
    use WithSorting;

    use WithPerPagePagination;

    use WithCachedRows;

    private ?Job $job = null;

    protected $listeners = ['refreshCities', 'refreshCountries', 'refreshDivisions'];

    public array $filters = [
        'search' => '',
        'category' => null,
        'categories' => [],
        'countries' => [],
        'divisions' => [],
        'cities' => [],
        'days' => null,
        'latest' => null,
        'oldest' => null,
    ];

    public function refreshCities(array $selected)
    {
        $this->filters['cities'] = $selected;
    }

    public function refreshCountries(array $selected)
    {
        $this->filters['countries'] = $selected;
    }

    public function refreshDivisions(array $selected)
    {
        $this->filters['divisions'] = $selected;
    }

    public function resetFilters()
    {
        $this->reset('filters');
        $this->resetPage();
        $this->emit('refreshFiltersSelected');
    }

    public function filtersChangeCountries(array $countries)
    {
        $this->filters['countries'] = $countries;
        $this->emit('refreshFiltersCountries', $countries);
    }

    public function getRowsQueryProperty()
    {
        $query = Job::query()
            ->published()
            ->with(['company', 'country:id,name', 'city:id,name', 'division:id,name', 'categories'])
            ->when($this->filters['countries'], fn ($query, $countries) => $query->whereIn('country_id', $countries))
            ->when($this->filters['divisions'], fn ($query, $divisions) => $query->whereIn('division_id', $divisions))
            ->when($this->filters['cities'], fn ($query, $cities) => $query->whereIn('city_id', $cities))
            ->when($this->filters['days'], fn ($query, $days) => $query->liveWithinDays($days))
            ->when($this->filters['categories'], fn ($query, $categories) => $query->whereHas('categories', fn (Builder $query) => $query->whereIn('categories.id', $categories)))
            ->when($this->filters['search'], fn ($query, $search) => $query->search($search));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(fn () => $this->applyPagination($this->rowsQuery));
    }

    public function render()
    {
        return view('livewire.jobs.jobs-component', ['rows' => $this->rows]);
    }
}
