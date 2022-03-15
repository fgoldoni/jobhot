<?php
namespace App\Providers;

use App\Models\Company;
use App\Policies\CompanyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Administrator') ? true : null;
        });

        if (Schema::hasTable('permissions')) {
            foreach ($this->getPermissions() as $permission) {
                Gate::define(
                    $permission->name,
                    static function ($user) use ($permission) {
                        return $user->hasPermissionTo($permission);
                    }
                );
            }
        }
    }

    private function getPermissions()
    {
        return Permission::get();
    }
}
