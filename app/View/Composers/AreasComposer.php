<?php
namespace App\View\Composers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\View\View;

/**
 * Class AreasComposer
 *
 * @package \App\View\Composers
 */
class AreasComposer
{
    public function compose(View $view)
    {
        $view->with('areas', Category::area()->orderBy('position')->get(['id', 'name', 'icon']));
        $view->with('companies', Company::get(['id', 'name', 'avatar_path']));
    }
}
