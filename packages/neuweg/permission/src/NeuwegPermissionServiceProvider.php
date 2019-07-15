<?php

namespace Neuweg\Permission;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class NeuwegPermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        Route::middleware('web')->group((__DIR__ . '/routes/web.php' ));

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'permissions');

    }
}
