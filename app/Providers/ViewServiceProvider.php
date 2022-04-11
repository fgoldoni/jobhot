<?php
namespace App\Providers;

use App\View\Composers\AreasComposer;
use App\View\Composers\IndustriesComposer;
use App\View\Composers\JobsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('livewire.admin.companies-datatable', IndustriesComposer::class);
        View::composer('livewire.admin.jobs-datatable', AreasComposer::class);
        View::composer('livewire.jobs.jobs-component', JobsComposer::class);
    }
}
