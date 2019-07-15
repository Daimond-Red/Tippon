<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\AppMaster;

class ViewComposerServiceProvider extends ServiceProvider
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
        view()->composer([
            'admin.masters.stores.form'

        ], function ($view) {

            $model = AppMaster::where('tag', 'region')->first();

            $regionOptions = [];

            if($model) $regionOptions = $model->optionsRel()->pluck('title', 'tag')->toArray(); 
            // $repository = new ItemMasterRepository();

            // $collection =  \Spatie\Permission\Models\Permission::all();

            $view->with('regionOptions', $regionOptions);
        });

        view()->composer([
            'admin.masters.stores.form'

        ], function ($view) {

            $model = AppMaster::where('tag', 'store_categories')->first();

            $catOptions = [];

            if($model) $catOptions = $model->optionsRel()->pluck('title', 'tag')->toArray(); 

            $view->with('catOptions', $catOptions);
        });
    }
}
