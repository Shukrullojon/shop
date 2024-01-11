<?php

use Illuminate\Support\Facades\Route;

// auth
Route::group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/phone', 'AuthController@phone');
    Route::post('/code', 'AuthController@code');
});


Route::group(['prefix' => 'module', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ModuleController@get');
});

Route::group(['prefix' => 'day', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'DayController@get');
});

Route::group(['prefix' => 'today', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'TodayController@get');
});

Route::group(['prefix' => 'result', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/set', 'ResultController@set');
    Route::get('/get', 'ResultController@get');
});

Route::group(['prefix' => 'user', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'UserController@get');
    Route::post('/update', 'UserController@update');
});

Route::group(['prefix' => 'event', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'EventController@get');
    Route::post('/set', 'EventController@set');
});



