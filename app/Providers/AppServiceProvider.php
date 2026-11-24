<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\GeneralInformation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // Force the live domain (site is served under /ae) everywhere except local dev,
        // so `php artisan serve` generates localhost URLs.
        if (! $this->app->environment(['local', 'testing'])) {
            URL::forceRootUrl('https://spatialpropertygroup.com/ae');
        }
        View::composer('*', function ($view) {
            
            $route = request()->route();
            $pageCode = $route?->getName();

            Log::info("Visited Page: ". $pageCode);

            // Share general information with all views
            $generalInfo = GeneralInformation::first();
            $view->with('generalInfo', $generalInfo);
        });
    }

}
