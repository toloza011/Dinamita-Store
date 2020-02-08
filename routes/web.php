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

Route::get('/', 'tablaController@inicio')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('validacion','Auth\LoginController@login')->name('validacion');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('registrar','VistaInicioController@registrar')->name('registrar');

/* function(){return view('registro');} */

Route::post('registro','Auth\RegisterController@create')->name('registro');

Route::get('vistainicio','VistaInicioController@index')->name('vistainicio');


