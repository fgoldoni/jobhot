<?php


namespace App\View\Composers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;

/**
 * Class JobsComposer
 *
 * @package \App\View\Composers
 */
class JobsComposer
{
    public function compose(View $view)
    {
        $view->with(
            'countries',
            Country::whereHas('jobs', fn (Builder $query) => $query->published())
                ->withCount(['jobs' => fn($query) => $query->published()->orderBy('jobs.name')->withoutGlobalScope('team')])
                ->orderBy('jobs_count', 'desc')
                ->limit(10)->get(['id', 'name']));


        $view->with(
            'cities',
            Job::published()->withoutGlobalScope('team')->select('city_id', DB::raw('COUNT(city_id) as count'))
                ->with('city:id,name')
                ->groupBy('city_id')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get());

        $view->with('industries', Category::industry()->orderBy('position')->get(['id', 'name', 'icon']));
        $view->with('areas', Category::has('jobs')->withCount(['jobs' => fn($query) => $query->published()->withoutGlobalScope('team')])->area()->orderBy('position')->get(['id', 'name', 'icon']));
        $view->with('companies', Company::withoutGlobalScope('team')->get(['id', 'name', 'avatar_path']));
    }
}
