<?php
namespace App\Http\Livewire\Jobs;

use App\Http\Livewire\Admin\Datatable\WithCachedRows;
use App\Http\Livewire\Admin\Datatable\WithPerPagePagination;
use App\Http\Livewire\Admin\Datatable\WithSorting;
use App\Models\Job;
use Livewire\Component;

class JobsComponent extends Component
{
    use WithSorting;

    use WithPerPagePagination;

    use WithCachedRows;

    private ?Job $job = null;

    public array $filters = [
        'search' => '',
        'days' => null,
        'latest' => null,
        'oldest' => null,
    ];

    public function mount()
    {
    }

    public function getRowsQueryProperty()
    {
        $query = Job::query()
            ->withoutGlobalScope('team')
            ->published()
            ->with(['company' => fn ($query) => $query->withoutGlobalScope('team'), 'country:id,name', 'city:id,name', 'division:id,name', 'categories'])
            ->when($this->filters['days'], fn ($query, $days) => $query->registeredWithinDays($days))
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
