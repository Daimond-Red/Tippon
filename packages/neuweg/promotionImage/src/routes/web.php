<?php


Route::group([

    'prefix' => config('app.admin_prefix', 'admin/modules'),
    'namespace' => 'Neuweg\PromotionImage\Controllers\Admin',
    'middleware' => 'admin.auth'

], function(){

	Route::get('promotion/images', ['as' => 'modules.promotionImages.index', 'uses' => 'PromotionImageController@index']);
    Route::get('promotion/images/create', ['as' => 'modules.promotionImages.create', 'uses' => 'PromotionImageController@create']);
    Route::post('promotion/images', ['as' => 'modules.promotionImages.store', 'uses' => 'PromotionImageController@store']);
    Route::get('promotion/images/{id}', [ 'as' => 'modules.promotionImages.show', 'uses' => 'PromotionImageController@show' ]);
    Route::get('promotion/images/{id}/edit', ['as' => 'modules.promotionImages.edit', 'uses' => 'PromotionImageController@edit']);
    Route::put('promotion/images/{id}', ['as' => 'modules.promotionImages.update', 'uses' => 'PromotionImageController@update']);
    Route::get('promotion/images/{id}/destroy', ['as' => 'modules.promotionImages.delete', 'uses' => 'PromotionImageController@destroy']);
});