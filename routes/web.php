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

Route::group(['prefix' => 'user/'], function(){
    Route::group(['prefix' => 'technician/'], function(){
        Route::get('fix-request/', 'TechnicianController@showFixRequest');
        Route::post('fix-request/update', 'TechnicianController@updateFixRequest');
        Route::get('dashboard', 'TechnicianController@showDashboard');
    });

    Route::group(['prefix' => 'customer/'], function(){
        Route::get('fix-request/', 'CustomerController@showFixRequest');
        Route::post('fix-request/update', 'CustomerController@updateFixRequest');
        Route::get('dashboard', 'CustomerController@showDashboard');
    });

    Route::group(['prefix' => 'reviewer/'], function(){
        Route::get('fix-request/', 'ReviewerController@showFixRequest');
        Route::post('fix-request/update', 'ReviewerController@updateFixRequest');
        Route::get('dashboard', 'ReviewerController@showDashboard');
    });
});

Route::group(['namespace' => 'Administrator', 'prefix' => 'backend/'],function(){

    Route::get('dashboard','AdministratorController@showDashboard')->name('admin.dashboard');
    Route::group(['prefix' => 'manage-users'], function(){
        Route::get('add', 'AdministratorController@showManageUsers')->name('admin.manage-users.show');
    });
    Route::group(['prefix' => 'technicians/'], function(){
        //thie translates to backend/technicians/
        Route::post('add', 'AdministratorController@addTechnician')->name('admin.technician.add');
    });

    Route::group(['prefix' => 'fix-request/'], function(){
        //this translates to backend/fix-request/
        Route::get('create', 'AdminController@showFixRequest')->name('admin.fix-request.create.show');
        Route::post('create', 'AdminController@createFixRequest')->name('admin.fix-request.create');
        Route::post('update', 'AdminController@updateFixRequest')->name('admin.fix-request.update');
    });
    //Login Processing
    Route::group(['namespace' => 'Auth','prefix' => 'auth/'],function(){
        //this translates to backend/auth/
        Route::get('backend-login', 'LoginController@showLoginForm')->name('admin.login.show');
        Route::post('backend-login', 'LoginController@login')->name('admin.login');
        Route::get('/logout', 'LoginController@logout')->name('admin.logout');
    });
});
