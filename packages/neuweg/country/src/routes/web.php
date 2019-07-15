<?php


Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Country\Controllers\Admin',
    'middleware' => 'admin.auth'

], function(){

	Route::get('countries', ['as' => 'modules.countries.index', 'uses' => 'CountryController@index']);
    Route::get('countries/create', ['as' => 'modules.countries.create', 'uses' => 'CountryController@create']);
    Route::post('countries', ['as' => 'modules.countries.store', 'uses' => 'CountryController@store']);
    Route::get('countries/{id}', [ 'as' => 'modules.countries.show', 'uses' => 'CountryController@show' ]);
    Route::get('countries/{id}/edit', ['as' => 'modules.countries.edit', 'uses' => 'CountryController@edit']);
    Route::put('countries/{id}', ['as' => 'modules.countries.update', 'uses' => 'CountryController@update']);
    Route::get('countries/{id}/destroy', ['as' => 'modules.countries.delete', 'uses' => 'CountryController@destroy']);
});