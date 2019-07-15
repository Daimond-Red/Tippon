<?php 


Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\Notification\Controllers\Admin'

], function(){

	Route::get('appNotifications', [ 'as' => 'modules.appNotifications.index', 'uses' => 'NotificationController@index' ]);
    Route::get('appNotifications/create', [ 'as' => 'modules.appNotifications.create', 'uses' => 'NotificationController@create' ]);
    Route::post('appNotifications', [ 'as' => 'modules.appNotifications.store', 'uses' => 'NotificationController@store' ]);
    Route::get('appNotifications/{id}', [ 'as' => 'modules.appNotifications.show', 'uses' => 'NotificationController@show' ]);
    Route::get('appNotifications/{id}/edit', [ 'as' => 'modules.appNotifications.edit', 'uses' => 'NotificationController@edit' ]);
    Route::put('appNotifications/{id}', [ 'as' => 'modules.appNotifications.update', 'uses' => 'NotificationController@update' ]);
    Route::get('appNotifications/{id}/destroy', [ 'as' => 'modules.appNotifications.delete', 'uses' => 'NotificationController@destroy' ]);
});