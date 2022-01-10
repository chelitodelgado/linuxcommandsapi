<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Administracion categorias
Route::post('/categorys', 'Api\CategoryController@show');
Route::post('/categoryAdd', 'Api\CategoryController@store');
Route::post('/categoryEdit', 'Api\CategoryController@edit');
Route::post('/categoryUpdate', 'Api\CategoryController@update');
Route::post('/categoryImport', 'Api\CategoryController@categoryImport');
Route::post('/categoryDestroy', 'Api\CategoryController@destroy');

// Administracion comandos
Route::post('/commands', 'Api\CommandController@show');
Route::post('/commandAdd', 'Api\CommandController@store');
Route::post('/commandEdit', 'Api\CommandController@edit');
Route::post('/commandUpdate', 'Api\CommandController@update');
Route::post('/commandsImport', 'Api\CommandController@commandsImport');
Route::post('/commandDestroy', 'Api\CommandController@destroy');

Route::get('/cifrasTorales', 'Api\CommandController@cifrasTorales');
