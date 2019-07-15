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

Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Permission\Controllers\Admin'

], function(){

    // departments
    Route::get('departments', [ 'as' => 'modules.departments.index', 'uses' => 'DepartmentController@index' ]);
    Route::get('departments/create', [ 'as' => 'modules.departments.create', 'uses' => 'DepartmentController@create' ]);
    Route::post('departments', [ 'as' => 'modules.departments.store', 'uses' => 'DepartmentController@store' ]);
    Route::get('departments/{id}/edit', [ 'as' => 'modules.departments.edit', 'uses' => 'DepartmentController@edit' ]);
    Route::put('departments/{id}', [ 'as' => 'modules.departments.update', 'uses' => 'DepartmentController@update' ]);
    Route::get('departments/{id}/destroy', [ 'as' => 'modules.departments.delete', 'uses' => 'DepartmentController@destroy' ]);

    // roles
    Route::get('designations/{department_id}/create', [ 'as' => 'modules.designations.create', 'uses' => 'DepartmentController@designation_create' ]);
    Route::post('designations/{department_id}/store', [ 'as' => 'modules.designations.store', 'uses' => 'DepartmentController@designation_store' ]);


    Route::get('permission/create', [ 'as' => 'modules.departments.permission', 'uses' => 'DepartmentController@permission_create' ]);
    Route::post('permission/store', [ 'as' => 'modules.departments.permission_store', 'uses' => 'DepartmentController@permission_store' ]);
    Route::get('permission/viewDesignation', [ 'as' => 'modules.departments.viewDesignation', 'uses' => 'DepartmentController@permission_viewDesignation' ]);
    Route::get('permission/viewMenus', [ 'as' => 'modules.departments.viewMenu', 'uses' => 'DepartmentController@permission_viewMenu' ]);

});

Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Permission\Controllers\Admin'

], function(){


    Route::get('permissionGroups', [ 'as' => 'modules.permissionGroups.index', 'uses' => 'PermissionGroupController@index' ]);
    Route::get('permissionGroups/create', [ 'as' => 'modules.permissionGroups.create', 'uses' => 'PermissionGroupController@create' ]);
    Route::post('permissionGroups', [ 'as' => 'modules.permissionGroups.store', 'uses' => 'PermissionGroupController@store' ]);
    Route::get('permissionGroups/{id}/edit', [ 'as' => 'modules.permissionGroups.edit', 'uses' => 'PermissionGroupController@edit' ]);
    Route::put('permissionGroups/{id}', [ 'as' => 'modules.permissionGroups.update', 'uses' => 'PermissionGroupController@update' ]);
    Route::get('permissionGroups/{id}/destroy', [ 'as' => 'modules.permissionGroups.delete', 'uses' => 'PermissionGroupController@destroy' ]);


    Route::get('permissionGroupOptions/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptions', 'uses' => 'PermissionGroupController@permissionGroupOptions' ]);
    Route::get('permissionGroupOptionCreate/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptionCreate', 'uses' => 'PermissionGroupController@permissionGroupOptionCreate' ]);
    Route::post('permissionGroupOptionsStore/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptionsStore', 'uses' => 'PermissionGroupController@permissionGroupOptionsStore' ]);
    Route::get('permissionGroupOptionEdit/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptionEdit', 'uses' => 'PermissionGroupController@permissionGroupOptionEdit' ]);
    Route::put('permissionGroupOptionUpdate/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptionUpdate', 'uses' => 'PermissionGroupController@permissionGroupOptionUpdate' ]);
    Route::get('permissionGroupOptionDelete/{id}', [ 'as' => 'modules.permissionGroups.permissionGroupOptionDelete', 'uses' => 'PermissionGroupController@permissionGroupOptionDelete' ]);


});


 Route::get('departments/{id}', [ 'as' => 'modules.departments.show', 'uses' => 'DepartmentController@show' ]);

 Route::get('search/departments', [ 'as' => 'modules.departments.search', 'uses' => 'DepartmentController@search' ]);



