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
Route::get('carrito2/{id}', 'CarritoController@insert_subscripcion')->name('carrito2');
Route::get('del/{id}', 'CarritoController@delete')->name('del');

//Pagar
Route::get('botonPagar', 'PagarController@index')->name('botonPagar');

//Login-Registrar-Logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('validacion', 'Auth\LoginController@login')->name('validacion');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('registro', 'Auth\RegisterController@create')->name('registro');

//Vista Agregar
Route::get('/getTableAll', 'AgregarJuegoController@getTableAll')->name('getTable');
//Vista Pagar
Route::get('pagar', 'VistasController@pagar')->name('pagar');
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

//rutas Categorias
Route::get('Agregar', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('categoria.listaCategoria', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("agregar");
Route::get('/getCategoriasAll', 'CategoriasController@getCategoriaAll')->name('getCategoria');
Route::get('/categoria/{id_categoria}/editar', ['uses' => 'CategoriasController@edit'])->name('editarCategoria');
Route::get('/update/{id_categoria}', ['uses' => 'CategoriasController@update'])->name('update');
Route::post('QuitarCategoria','CategoriasController@QuitarCategoria');
Route::get('Crear','CategoriasController@agregar')->name('create');
Route::post('insertar','CategoriasController@insertar');

//rutas Plataforma
Route::get('AgregarPlataforma', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('plataforma.listaPlataforma', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("agregarPlataforma");
Route::get('/getPlataformasAll', 'PlataformasController@getPlataformaAll')->name('getPlataforma');
Route::get('/plataforma/{id_plataforma}/editar', ['uses' => 'PlataformasController@edit'])->name('editarPlataforma');
Route::get('/update2/{id_plataforma}', ['uses' => 'PlataformasController@update'])->name('updatePlataforma');
Route::post('QuitarPlataforma','PlataformasController@QuitarPlataforma');
Route::get('CrearPlataforma','PlataformasController@agregar')->name('createPlataforma');
Route::post('insertarPlataforma','PlataformasController@insertar');


//rutas Usuarios

Route::get('ListaUsuarios', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('users.listaUsuarios', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("ListaUsuarios");
Route::get('/getUsuariosAll', 'UserController@getUserAll')->name('getUser');
Route::get('/users/{id}/editar', ['uses' => 'UserController@edit'])->name('editarUsuario');
Route::get('/update3/{id}', ['uses' => 'UserController@update'])->name('updateUsuario');
Route::post('QuitarUsuario','UserController@QuitarPlataforma');

//rutas Juegos 
Route::get('ListaJuegos', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('juegos.listaJuegos', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("ListaJuegos");
Route::get('/getJuegosAll', 'JuegosController@getJuegosAll')->name('getJuegos');
Route::get('/juego/{id_juego}/editar', ['uses' => 'JuegosController@edit'])->name('editarJuego');
Route::post('/updateStock/{id}', ['uses' => 'JuegosController@updateStock'])->name('updateStockk');
Route::post('/updatenombre/{id}', ['uses' => 'JuegosController@updateNombreJ'])->name('updateJuegos');
Route::get('CrearJuego','JuegosController@agregar')->name('createJuegos');
Route::post('insertarJuego','JuegosController@insertar');
Route::post('QuitarJuego','JuegosController@QuitarJuego');

//rutas Suscripciones
Route::get('ListaSuscripciones', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('suscripciones.listaSuscripciones', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("ListaSus");
Route::get('/getSuscripcionesAll', 'SuscripcionesController@getSusAll')->name('getSus');
Route::get('/sus/{id_subscripcion}/editar', ['uses' => 'SuscripcionesController@edit'])->name('editarSus');
Route::post('/updateStock2/{id}', ['uses' => 'SuscripcionesController@updateStock'])->name('updateStockk2');
Route::post('/updaSus/{id}', ['uses' => 'SuscripcionesController@updateSus'])->name('updateSus');
Route::get('CrearSus','SuscripcionesController@agregar')->name('createSus');
Route::post('insertarSus','SuscripcionesController@insertar');
Route::post('QuitarSus','SuscripcionesController@QuitarSus');

//Rutas Ofertas
Route::get('OfertasRelampagos','VistasController@indexOfertas')->name('Ofertas');
Route::get('ListaOfertas', function (Request $request) {
    $InfoCategoria = App\Categoria::all();
    $InfoPlataformaJ = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = App\Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    return view('ofertas.listaOfertas', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
})->name("ListaOfertas");
Route::get('/getOfertasAll', 'OfertasController@getOfertasAll')->name('getOfertas');
Route::get('/getOfertasJuegosAll/{id_oferta}', 'OfertasController@getOfertasJuegosAll')->name('getJuegosOferta');
Route::get('/oferta/{id_oferta}/editar', ['uses' => 'OfertasController@edit'])->name('editarOferta');
Route::post('/updaOfertas/{id}', ['uses' => 'OfertasController@updateOferta'])->name('updateOferta');
Route::post('editarPorcentaje','OfertasController@editarPorcentaje')->name("editarPorcentaje");
Route::get('CrearOferta','OfertasController@agregar')->name('createOferta');
Route::post('insertarOferta','OfertasController@insertar');
Route::post('QuitarOferta','OfertasController@QuitarOferta');



//Perfil Usuario
Route::get('Configuracion/User/{id}','VistasController@InfoUsuario')->name('InfoUser');
Route::get('Configuracion/User/{id}/editar','UserController@updateUsuario')->name('updateUser');
Route::get('RecuperarPass','UserController@RecuperarPass')->name('RecuperarContra');
Route::get('CambiarPass','UserController@EnviarDatos')->name('EnviarDatos');

//Fin Perfil Usuario




//Fin Ofertas


