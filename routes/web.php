<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('admin.dashboard');

Route::group([ 'prefix' => config('app.admin_prefix', 'admin'), 'middleware' => 'admin.auth', 'namespace' => 'Admin' ], function(){

    Route::get('/users', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);

	Route::get('users/create', [ 'as' => 'admin.users.create', 'uses' => 'UserController@create' ]);
    Route::post('users', [ 'as' => 'admin.users.store', 'uses' => 'UserController@store' ]);
    Route::get('users/{id}', [ 'as' => 'admin.users.show', 'uses' => 'UserController@show' ]);
    Route::get('users/{id}/edit', [ 'as' => 'admin.users.edit', 'uses' => 'UserController@edit' ]);
    Route::put('users/{id}', [ 'as' => 'admin.users.update', 'uses' => 'UserController@update' ]);
    Route::get('users/{id}/destroy', [ 'as' => 'admin.users.delete', 'uses' => 'UserController@destroy' ]);
    Route::get('search/users', [ 'as' => 'admin.users.search', 'uses' => 'UserController@search' ]);
    Route::post('imports/users', [ 'as' => 'admin.users.import', 'uses' => 'UserController@import' ]);
    Route::get('users/{id}/profile', [ 'as' => 'admin.users.profile', 'uses' => 'UserController@profile' ]);

    Route::get('update/password', [ 'as' => 'admin.users.updatePassword', 'uses' => 'UserController@updatePassword' ]);
    Route::post('update/password', [ 'as' => 'admin.users.updatePasswordStore', 'uses' => 'UserController@updatePasswordStore' ]);

    

});
