<?php
namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

/**
 * Class IndustriesComposer
 *
 * @package \App\View\Composers
 */
class IndustriesComposer
{
    public function compose(View $view)
    {
        $view->with('industries', Category::industry()->orderBy('position')->get(['id', 'name', 'icon']));
    }
}
