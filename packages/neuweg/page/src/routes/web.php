<?php

Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Page\Controllers\Admin',
    'middleware' => 'admin.auth'

], function(){

	Route::get('pages', ['as' => 'modules.pages.index', 'uses' => 'PageController@index']);
    Route::get('pages/create', ['as' => 'modules.pages.create', 'uses' => 'PageController@create']);
    Route::post('pages', ['as' => 'modules.pages.store', 'uses' => 'PageController@store']);
    Route::get('pages/{id}', [ 'as' => 'modules.pages.show', 'uses' => 'PageController@show' ]);
    Route::get('pages/{id}/edit', ['as' => 'modules.pages.edit', 'uses' => 'PageController@edit']);
    Route::put('pages/{id}', ['as' => 'modules.pages.update', 'uses' => 'PageController@update']);
    Route::get('pages/{id}/destroy', ['as' => 'modules.pages.delete', 'uses' => 'PageController@destroy']);
});