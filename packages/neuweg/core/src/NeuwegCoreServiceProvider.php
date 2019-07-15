<?php

namespace Neuweg\Core;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class NeuwegCoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
        $this->app->singleton('VoyagerAuth', function () {
            return auth();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        include __DIR__.'/helpers.php';
        include __DIR__.'/macros.php';

    }
}
