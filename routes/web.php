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
Route::get('/', 'tablaController@inicio')->name('home');

//Login-Registro-Logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Valida la sesion 
Route::post('validacion','Auth\LoginController@login')->name('validacion');
//cerrar sesion 
Route::get('logout','Auth\LoginController@logout')->name('logout');
//Vista Registrar
Route::get('registrar','VistasController@registrar')->name('registrar');
//Funcion Registrar
Route::post('registro','Auth\RegisterController@create')->name('registro');
//Reseteo de Contraseña
Route::get('password/reset','Auth\ForgotPasswordController');

//Vista Inicio(recibe la id)
Route::get('vistainicio','VistasController@index')->name('vistainicio');

//Vista Juego 
Route::get('juego','VistasController@vistajuego')->name('juego');


