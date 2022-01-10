<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home',       'HomeController@index')->name('home');
Route::get('/categorias', 'HomeController@categorias')->name('categorias');
Route::get('/comandos',   'HomeController@comandos')->name('comandos');
Route::get('/usuarios',   'HomeController@usuarios')->name('usuarios');
Route::get('/api',        'HomeController@api')->name('api');

// RUTAS API WEB
Route::get('/categorys', 'Web\CommandController@showCategorys');
Route::get('/category/{category}', 'Web\CommandController@showNameCategory');
Route::get('/commands', 'Web\CommandController@showCommands');
Route::get('/command/{command}', 'Web\CommandController@showNameCommand');
Route::get('/commandsByCategory/{category}', 'Web\CommandController@showCommandByCategoria');

// RUTAS EXPORT DATA
Route::get('export-category', 'Web\UploadFileController@exportCategorys')->name('export-category');
Route::get('download-category', 'Web\UploadFileController@downloadPlantilla')->name('download-category');
