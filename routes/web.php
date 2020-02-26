<?php

use Illuminate\Http\Request;

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



//Carrito
Route::get('carrito/{id}', 'CarritoController@index')->name('carrito');
Route::get('del/{id}', 'CarritoController@delete')->name('del');

//Login-Registrar-Logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('validacion', 'Auth\LoginController@login')->name('validacion');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('registro', 'Auth\RegisterController@create')->name('registro');

//Vista Agregar
Route::get('/getTableAll', 'AgregarJuegoController@getTableAll')->name('getTable');

//Vista Registrar
Route::get('registrar', 'VistasController@registrar')->name('registrar');
//Vista Juego
Route::get('juego', 'VistasController@vistajuego')->name('juego');
//Vista Subscripciones
Route::get('subscripciones', 'VistasController@vistaSubcripcion')->name('subcripciones');
//Review Producto
Route::get('ReviewJuego/{id}', 'VistasController@vistaReview')->name('review');
Route::get('ReviewSub/{id}', 'VistasController@vistaReviewSub')->name('reviewSub');

Route::get('Categoria/{id}', 'VistasController@vistaCategoria')->name('categoria');

Route::get('Plataforma/{id}', 'VistasController@vistaPlataforma')->name('plataforma');

Route::get('buscar', 'VistasController@buscar')->name('buscar');
Route::get('Agregar', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('categoria.listaCategoria', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("agregar");


//rutas Categorias
Route::get('/getCategoriasAll', 'CategoriasController@getCategoriaAll')->name('getCategoria');
Route::get('/categoria/{id_categoria}/editar', ['uses' => 'CategoriasController@edit'])->name('editarCategoria');
Route::get('/update/{id_categoria}', ['uses' => 'CategoriasController@update'])->name('update');
Route::post('QuitarCategoria','CategoriasController@QuitarCategoria');

