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

Route::get('/', 'tablaController@inicio');

Route::get('fotos/{numero?}',function($numero = 'sin numero'){
    return view('fotos');
})->where('numero', '[0-9]+');;

Route::view('galeria','fotos')->name('fotos');
Route::view('blog','blog')->name('blog');
Route::get('nosotros/{nombre?}',function($nombre = null){

    $equipo = ['miguel','juan','pepe'];
   // return view('nosotros',['equipo'=>$equipo]);
   return view('nosotros',compact('equipo','nombre'));

})->name('nosotros');

