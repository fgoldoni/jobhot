<?php
namespace App\Providers;

use App\Events\JobViewCount;
use App\Listeners\JobViewCountHandler;
use App\Listeners\LoginListener;
use App\Listeners\Teamwork\JoinTeamListener;
use App\Models\Company;
use App\Observers\CompanyObserver;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        Login::class => [
            JoinTeamListener::class,
            LoginListener::class,
        ],

        JobViewCount::class => [
            JobViewCountHandler::class
        ]

    ];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        Company::class => [CompanyObserver::class],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
