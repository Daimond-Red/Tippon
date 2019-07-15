<?php

Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Post\Controllers\Admin',
    'middleware' => 'admin.auth'

], function(){

	Route::get('posts', ['as' => 'modules.posts.index', 'uses' => 'PostController@index']);
    Route::get('posts/create', ['as' => 'modules.posts.create', 'uses' => 'PostController@create']);
    Route::post('posts', ['as' => 'modules.posts.store', 'uses' => 'PostController@store']);
    Route::get('posts/{id}', [ 'as' => 'modules.posts.show', 'uses' => 'PostController@show' ]);
    Route::get('posts/{id}/edit', ['as' => 'modules.posts.edit', 'uses' => 'PostController@edit']);
    Route::put('posts/{id}', ['as' => 'modules.posts.update', 'uses' => 'PostController@update']);
    Route::get('posts/{id}/destroy', ['as' => 'modules.posts.delete', 'uses' => 'PostController@destroy']);
});