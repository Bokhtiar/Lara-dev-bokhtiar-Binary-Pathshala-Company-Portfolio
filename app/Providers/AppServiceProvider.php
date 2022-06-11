<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\WebSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('route', function ($expression) {
            return "<?php echo route ($expression); ?>";
        });

        view()->composer('*', function($view) {
            $view->with('webSetting', WebSetting::query()->first());
        });

        view()->composer('*', function($view) {
            $view->with('services', Service::query()->Active()->get());
        });

    }
}
