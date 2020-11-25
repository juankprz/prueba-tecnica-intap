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
Route::get('/registro-actividad', 'ActivityController@index')->name('register.activity');
Route::post('/registro-actividad', 'ActivityController@store')->name('activity.store');
Route::get('/registro-tiempo', 'TimeController@index')->name('register.time');
Route::get('/actividad-detalle/{id}', 'ActivityController@show')->name('activity.show');
Route::post('/registro-tiempo', 'TimeController@store')->name('time.store');
