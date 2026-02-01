<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\URL;
=======
>>>>>>> ebf1a3b (Initial commit)

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
<<<<<<< HEAD
        if ($this->app->environment('production')) {
        URL::forceScheme('https');
    }
=======
        //
>>>>>>> ebf1a3b (Initial commit)
    }
}
