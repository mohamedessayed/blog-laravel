<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        //
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super-Admin')) {
                             return true;
                         }
        });
        Paginator::useBootstrapFive();
        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
