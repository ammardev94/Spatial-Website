<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            
            $route = request()->route();
            $pageCode = $route?->getName();

            Log::info("Visited Page: ". $pageCode);

        });
    }

}
