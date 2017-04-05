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

Route::group([], function () {

    Route::match(['get','post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
  
    Route::auth();
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {
    
    Route::get('/', function () {

        if (view()->exists('admin.index')) {

            $data = ['title' => 'Admin Panel'];

            return view('admin.index', $data);
        }

    });

    Route::group(['prefix'=>'peoples'], function () {

        Route::get('/', ['uses'=>'PeoplesController@execute', 'as'=>'peoples']);
        Route::match(['get','post'], '/add', ['uses'=>'PeoplesAddController@execute', 'as'=>'peoplesAdd']);
        Route::match(['get','post', 'delete'], '/edit/{people}', ['uses'=>'PeoplesEditController@execute', 'as'=>'peoplesEdit']);
    });

    Route::group(['prefix'=>'portfolio'], function () {

        Route::get('/', ['uses'=>'PortfolioController@execute', 'as'=>'portfolio']);
        Route::match(['get','post', 'delete'], '/edit/{page}', ['uses'=>'PortfolioEditController@execute']);
        Route::match(['get','post'], '/add', ['uses'=>'PortfolioAddController@execute', 'as'=>'portfolioAdd']);
        Route::match(['get','post', 'delete'], '/edit/{portfolio}', ['uses'=>'PortfolioEditController@execute', 'as'=>'portfolioEdit']);
    });

    Route::group(['prefix'=>'services'], function () {

        Route::get('/', ['uses'=>'ServiceController@execute', 'as'=>'services']);
        Route::match(['get','post'], '/add', ['uses'=>'ServiceAddController@execute', 'as'=>'serviceAdd']);
        Route::match(['get','post', 'delete'], '/edit/{service}', ['uses'=>'ServiceEditController@execute', 'as'=>'serviceEdit']);
    });
});