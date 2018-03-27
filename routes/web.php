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

Route::resource('User','UserController');
Route::resource('Lokacija','LokacijaController');
Route::resource('Pretplatnik','PretplatnikController');
Route::resource('Prijatelj','PrijateljController');

Route::get('user/create', 'UserController@create');
Route::gpost('user/create', 'UserController@store');
