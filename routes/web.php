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

Route::get('login',function(){return view('login');})->name('login');

Route::post('validacion','Auth\LoginController@login')->name('validacion');

Route::get('registrar',function(){return view('registrar');})->name('registrar');

Route::post('registro','Auth\RegisterController@create')->name('registro');
