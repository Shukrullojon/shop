<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'category', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'CategoryController@get');
});

Route::group(['prefix' => 'product', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ProductController@get');
});



