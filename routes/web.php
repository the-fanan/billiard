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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Administrator', 'prefix' => 'backend/'],function(){

    //Login Processing
    Route::group(['namespace' => 'Auth','prefix' => 'auth'],function(){
        Route::get('backend-login', 'LoginController@showLoginForm')->name('admin.login.show');
        Route::post('backend-login', 'LoginController@login')->name('admin.login');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    });
});
