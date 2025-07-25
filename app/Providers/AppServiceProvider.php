<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


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

        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Nightwatch - minimising nightwatch events
        // Nightwatch::rejectCacheEvents(function (CacheEvent $cacheEvent) {
        //     return in_array($cacheEvent->key, [
        //         'laravel:reverb:restart',
        //         'illuminate:queue:restart',
        //     ]);
        // });
    }
}
