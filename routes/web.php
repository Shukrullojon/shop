<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Module
    Route::group(['prefix' => 'module', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'ModuleController@index')->name('moduleIndex');
        Route::get('/create', 'ModuleController@create')->name('moduleCreate');
        Route::post('/store', 'ModuleController@store')->name('moduleStore');
        Route::get('/show/{id}', 'ModuleController@show')->name('moduleShow');
        Route::get('/edit/{id}', 'ModuleController@edit')->name('moduleEdit');
        Route::post('/update/{id}', 'ModuleController@update')->name('moduleUpdate');
        Route::delete('/delete/{id}', 'ModuleController@delete')->name('moduleDelete');
    });
    // Day
    Route::group(['prefix' => 'day', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'DayController@index')->name('dayIndex');
        Route::get('/create', 'DayController@create')->name('dayCreate');
        Route::post('/store', 'DayController@store')->name('dayStore');
        Route::get('/show/{id}', 'DayController@show')->name('dayShow');
        Route::get('/edit/{id}', 'DayController@edit')->name('dayEdit');
        Route::post('/update/{id}', 'DayController@update')->name('dayUpdate');
        Route::delete('/delete/{id}', 'DayController@delete')->name('dayDelete');
    });

    // User
    Route::group(['prefix' => 'user', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'UserController@index')->name('userIndex');
        Route::get('/add', 'UserController@add')->name('userAdd');
        Route::post('/create', 'UserController@create')->name('userCreate');
        Route::get('/{id}/edit', 'UserController@edit')->name('userEdit');
        Route::post('/update/{id}', 'UserController@update')->name('userUpdate');
        Route::delete('/delete/{id}', 'UserController@destroy')->name('userDestroy');
        Route::get('/theme-set/{id}', 'UserController@setTheme')->name('userSetTheme');
    });

    // Permission
    Route::group(['prefix' => 'permission', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'PermissionController@index')->name('permissionIndex');
        Route::get('/add', 'PermissionController@add')->name('permissionAdd');
        Route::post('/create', 'PermissionController@create')->name('permissionCreate');
        Route::get('/{id}/edit', 'PermissionController@edit')->name('permissionEdit');
        Route::post('/update/{id}', 'PermissionController@update')->name('permissionUpdate');
        Route::delete('/delete/{id}', 'PermissionController@destroy')->name('permissionDestroy');
    });

    // Role
    Route::group(['prefix' => 'role', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'RoleController@index')->name('roleIndex');
        Route::get('/add', 'RoleController@add')->name('roleAdd');
        Route::post('/create', 'RoleController@create')->name('roleCreate');
        Route::get('/{id}/edit', 'RoleController@edit')->name('roleEdit');
        Route::post('/update/{id}', 'RoleController@update')->name('roleUpdate');
        Route::delete('/delete/{id}', 'RoleController@destroy')->name('roleDestroy');
    });
});
