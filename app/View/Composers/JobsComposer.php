<?php
namespace App\View\Composers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\View\View;

/**
 * Class JobsComposer
 *
 * @package \App\View\Composers
 */
class JobsComposer
{
    public function compose(View $view)
    {
        $view->with('industries', Category::industry()->orderBy('position')->get(['id', 'name', 'icon']));
        $view->with('areas', Category::withCount(['jobs' => fn ($query) => $query->published()->withoutGlobalScope('team')])->area()->orderBy('position')->get(['id', 'name', 'icon']));
        $view->with('companies', Company::withoutGlobalScope('team')->get(['id', 'name', 'avatar_path']));
    }
}
