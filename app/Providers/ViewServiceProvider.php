<?php

namespace App\Providers;

use App\View\Composers\AreasComposer;
use App\View\Composers\IndustriesComposer;
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
    }
}
