<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;

/**
 * Class EloquentServiceProvider
 * All eloquent events and eloquent related services will be registered here
 *
 * @package App\Providers
 */
class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Define Eloquent Observers.
        User::observe(UserObserver::class);
    }
}
