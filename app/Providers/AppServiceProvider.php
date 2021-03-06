<?php
namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Modules\Countries\Providers\CountriesServiceProvider;
use Modules\Plans\Providers\PlansServiceProvider;
use Modules\Settings\Providers\SettingsServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ViewServiceProvider::class);
        $this->app->register(CountriesServiceProvider::class);
        $this->app->register(SettingsServiceProvider::class);
        $this->app->register(PlansServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('br2nl', function ($string) {
            return "<?php echo preg_replace('/\<br(\s*)?\/?\>/i', \"\n\", $string); ?>";
        });

        Component::macro('notify', function ($message) {
            $this->dispatchBrowserEvent('notify', $message);
        });

        Component::macro('banner', function ($message, $url = null) {
            session()->put('flash.banner', $message);

            $this->dispatchBrowserEvent('banner-message', [
                'style' => 'success',
                'message' => $message,
                'url' => $url,
            ]);
        });

        Builder::macro('toCsv', function () {
            $results = $this->get();

            if ($results->count() < 1) {
                return;
            }

            $titles = implode(',', array_keys((array) $results->first()->getAttributes()));

            $values = $results->map(function ($result) {
                return implode(',', collect($result->getAttributes())->map(function ($thing) {
                    return '"' . $thing . '"';
                })->toArray());
            });

            $values->prepend($titles);

            return $values->implode("\n");
        });

        Blade::directive('impersonating', function ($guard = null) {
            return "<?php if (is_impersonating({$guard})) : ?>";
        });

        Blade::directive('endImpersonating', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('canImpersonate', function ($guard = null) {
            return "<?php if (can_impersonate({$guard})) : ?>";
        });

        Blade::directive('endCanImpersonate', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('canBeImpersonated', function ($expression) {
            $args = preg_split("/,(\s+)?/", $expression);
            $guard = $args[1] ?? null;

            return "<?php if (can_be_impersonated({$args[0]}, {$guard})) : ?>";
        });

        Blade::directive('endCanBeImpersonated', function () {
            return '<?php endif; ?>';
        });
    }
}
