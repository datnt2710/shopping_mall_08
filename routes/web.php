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

Route::get('getImg', 'HomeController@getImg');

Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'namespace' => 'Admin'], function() {
    
    Route::get('login', 'AdminLoginController@getLogin')->name('getLogin');
    Route::post('login', 'AdminLoginController@postLogin')->name('postLogin');
    Route::post('logout', 'AdminLoginController@getLogout')->name('getLogout');

    Route::group(['middleware' => 'CheckAdminLogin'], function() {

        Route::get('/', 'HomeController@index')->name('home');
        
        Route::resource('category', 'CategoryController');

        Route::resource('product', 'ProductController');
        Route::post('reuse-product', 'ProductController@reuse')->name('product.reuse');

        Route::resource('order', 'OrderController');
        Route::post('approve-order', 'OrderController@approveOrder');
        Route::post('reject-item', 'OrderController@rejectItem');

        Route::resource('promotion', 'PromotionController');
    });
});

Route::get('/', [
                        'as' => 'home',
                        'uses' => 'User\HomeController@getHome'
                        ]);

Route::get('/category/{type}', [
                        'as' => 'category',
                        'uses' => 'User\HomeController@getCate'
                        ]);

Route::get('/product/{id}', [
                        'as' => 'product',
                        'uses' => 'User\HomeController@getProd'
                        ]);
