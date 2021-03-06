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
        $view->with('industries', Category::has('jobs')->withCount(['jobs' => fn ($query) => $query->published()])->industry()->positionAsc()->get());
        $view->with('areas', Category::has('jobs')->withCount(['jobs' => fn ($query) => $query->published()])->area()->positionAsc()->get());
        $view->with('companies', Company::has('jobs')->get(['id', 'name', 'avatar_path']));
    }
}
