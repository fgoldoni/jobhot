<?php


namespace App\View\Composers;

use App\Models\Job;
use Illuminate\View\View;

/**
 * Class SingleJobComposer
 *
 * @package \App\View\Composers
 */
class SingleJobComposer
{
    public function compose(View $view)
    {
        $view->with('companies', Job::with('company')->where('slug', request()->get('slug'))->get(['id', 'name', 'avatar_path']));
    }

}
