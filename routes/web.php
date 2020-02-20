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

//Inicio
Route::get('/', 'VistasController@inicio')->name('home');

//Login-Registrar-Logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('validacion','Auth\LoginController@login')->name('validacion');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('registro','Auth\RegisterController@create')->name('registro');

//Vista Registrar
Route::get('registrar','VistasController@registrar')->name('registrar');
//Vista Juego
Route::get('juego','VistasController@vistajuego')->name('juego');
//Vista Subscripciones
Route::get('subscripciones','VistasController@vistaSubcripcion')->name('subcripciones');

Route::get('Review/{id}','VistasController@vistaReview')->name('review');


