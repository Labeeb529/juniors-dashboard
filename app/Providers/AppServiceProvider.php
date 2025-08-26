<?php

namespace App\Providers;

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
        //
        if (!file_exists(storage_path('app/cookies'))) {
            mkdir(storage_path('app/cookies'), 0777, true);
        }
    }
}
