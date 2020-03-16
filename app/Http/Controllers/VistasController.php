<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\Plataforma;
use App\Juego;
use App\Subcripcion;
use App\Carrito;
use App\Venta;
use App\Imagenes;
use DB;

class VistasController extends Controller
{
    public function inicio(Request $request)
    {
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
            $nameUser = $InfoUser[0]->name;
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            //dd($asd);
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");


            $consulta = Juego::all()->sortByDesc('id_juego')->take(8);
            $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
            $populares = DB::table('populares')->join('juegos', 'juegos.id_juego', '=', 'populares.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'stock_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();

            return view('inicio', compact('User','nameUser','asd','asd2','idusuario','InfoUser', 'InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request', 'consulta', 'ofertas','populares'));
        } else {
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $consulta = Juego::orderBy('id_juego','DESC')->take(8)->get();
            $contador = DB::table('promociones')->count("*");
            $populares = DB::table('populares')->join('juegos', 'juegos.id_juego', '=', 'populares.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'stock_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();
            $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
                ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();


            if ($contador == 0) {
                $ofertas = "no";
            }
            //dd($InfoPlataformaJ);
            return view('inicio', compact('InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request', 'consulta', 'ofertas', 'populares'));
        }
    }
    function vistaRespuesta(Request $request)
    {

        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoCategoria = Categoria::all();
        $responseCode = $_GET['responseCode'];
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            /* if($responseCode == 0){
                DB::table('carritos')->where('id', '=',$idusuario)->delete();
                Venta::insert(['id'=> $id_usuario,'id_juego'=> $id]);
            } */
            return view('respuesta', compact('idusuario','request','responseCode','User','ofertas','InfoCategoria','asd','InfoPlataformaJ','InfoPlataformaS','asd2'));
        }
        return view('respuesta',compact('InfoPlataformaJ','request','responseCode','InfoPlataformaS','InfoCategoria'));
    }
    function vistajuego(Request $request)
    {
        $nombre = $request->get('buscador');
        $InfoJuego = Juego::where('nombre_juego', 'like', "%$nombre%")->paginate(5);

        $allJuegos = Juego::select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.precio_juego', 'juegos.url_juego', 'plataformas.nombre_plataforma')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->orderBy('stock_juego', 'DESC')->simplepaginate(8);
        $categoria = $request->get('tipo');
        $CategoriaJuegos = DB::select("SELECT juegos_categoria.id_categoria FROM juegos_categoria");
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        //dd($allJuegos);
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('juegos', compact('User','asd','asd2','InfoJuego', 'allJuegos', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request','ofertas'))->withJuego($InfoJuego);
        }else{
            return view('juegos', compact('InfoJuego', 'allJuegos', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request','ofertas'))->withJuego($InfoJuego);
        }
    }

    function pagar(Request $request)
    {
        $nombre = $request->get('buscador');
        $InfoJuego = Juego::where('nombre_juego', 'like', "%$nombre%")->paginate(5);

        $allJuegos = Juego::select('juegos.id_juego', 'juegos.nombre_juego', 'juegos.precio_juego', 'juegos.url_juego', 'plataformas.nombre_plataforma')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->simplepaginate(8);
        $categoria = $request->get('tipo');
        $CategoriaJuegos = DB::select("SELECT juegos_categoria.id_categoria FROM juegos_categoria");
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        //dd($allJuegos);
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.stock_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma order by stock_juego desc");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.stock_suscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma, plataformas.id_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma order by stock_suscripcion desc");
            return view('pagar', compact('asd','asd2','InfoJuego', 'allJuegos', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request','ofertas'))->withJuego($InfoJuego);
        }else{
            return view('pagar', compact('InfoJuego', 'allJuegos', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request','ofertas'))->withJuego($InfoJuego);
        }
    }

    function vistaSubcripcion(Request $request)
    {
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $nombre = $request->get('buscador');
        $InfoSubcripcion = Subcripcion::where('tipo_subscripcion', 'like', "%$nombre%")->orderBy('stock_suscripcion', 'DESC')->paginate(8);
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('subcripciones', compact('User','idusuario','asd','asd2','ofertas','InfoSubcripcion', 'InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
        }else{
            return view('subcripciones', compact('InfoSubcripcion','ofertas', 'InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request'));
        }
    }
    function vistaReview(Request $request, $id)
    {
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();

        $InfoJuego = Juego::all()->where('id_juego', '=', $id)->first();
        $imagenes = Imagenes::all()->where('id_juego', '=', $id);
        //dd($imagenes);DB::table('juegos_categoria')->select('categoria.id_categoria','categoria.nombre_categoria')
        $CategoriaJuego = DB::table('juegos_categoria')->join('categorias','categorias.id_categoria','=','juegos_categoria.id_categoria')->where('juegos_categoria.id_juego','=',$id)->select('*')->get();
        $PlataformaJuego = DB::table('juegos')->join('plataformas','plataformas.id_plataforma','=','juegos.id_plataforma')->select('plataformas.id_plataforma','plataformas.nombre_plataforma')->where('juegos.id_plataforma','=',$InfoJuego->id_plataforma)->where('juegos.id_juego','=',$id)->get();
        //dd($PlataformaJuego);

        $imgs = DB::select("SELECT imagenes.url FROM imagenes WHERE imagenes.id_juego = $id");
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoCategoria = Categoria::all();
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('reviewProducto', compact('User','PlataformaJuego','ofertas','asd2','asd','CategoriaJuego', 'InfoJuego', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'imgs', 'request'));
        }else{
            return view('reviewProducto', compact('PlataformaJuego','ofertas','CategoriaJuego', 'InfoJuego', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'imgs', 'request'));
        }
    }
    function vistaReviewSub(Request $request, $id)
    {
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $nombre = $request->get('buscador');
        $InfoSubcripcion = Subcripcion::where('tipo_subscripcion', 'like', "%$nombre%")->orderBy('stock_suscripcion', 'DESC')->paginate(8);
        $InfoSubcripcion = DB::table('subscripciones')->join("plataformas", 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->select("*")->where('id_subscripcion', '=', $id)->first();
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoJuego = Juego::where('nombre_juego', 'like', "%$nombre%")->paginate(5);
        if (Auth::user() != null) {
            $ofertas=DB::select("SELECT * FROM ofertas, promociones, juegos, plataformas where promociones.id_oferta=ofertas.id_oferta and juegos.id_juego = promociones.id_juego and juegos.id_plataforma = plataformas.id_plataforma");
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('reviewSub', compact('User','asd','asd2','ofertas','InfoJuego','InfoSubcripcion', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
            //diego agrego ofertas infojuego infosubcripcion(el que sale primero)
        }else{
            return view('reviewSub', compact('InfoSubcripcion','ofertas','InfoJuego','InfoSubcripcion','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
        }
    }   


    function registrar(Request $request)
    {
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

        // dd($InfoUser);
        return view('registro', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    function buscar(Request $request)
    {
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $InfoCategoria = Categoria::all();
        $InfoSubcripcion = Subcripcion::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $clave = $_GET['buscador'];
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();


        $consulta = DB::table('juegos')->select('*')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->where('nombre_juego', 'like', "%$clave%")->orderBy('stock_juego', 'DESC')->get();
        $consulta2 = DB::table('subscripciones')->select('*')->join('plataformas', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->where('nombre_plataforma', 'like', "%$clave%")->orderBy('stock_suscripcion', 'DESC')->get();

        //dd($consulta2);
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('buscador', compact('User','asd','asd2','ofertas','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request', 'consulta', 'consulta2','clave'));
        }else{
            return view('buscador', compact('InfoSubcripcion','InfoCategoria','ofertas', 'InfoPlataformaJ', 'InfoPlataformaS', 'request', 'consulta', 'consulta2','clave'));
        }
    }

    function vistaCategoria(Request $request, $id)
    {
        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoCategoria = Categoria::all();
        $Categoria = Categoria::all()->where('id_categoria', '=', $id)->first();
        $Juegos = DB::table('juegos_categoria')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.precio_juego', 'juegos.url_juego', 'plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'juegos.id_juego', 'juegos_categoria.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->where('juegos_categoria.id_categoria', '=', $id)->orderBy('stock_juego', 'DESC')->get();

        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            return view('categoria', compact('User','asd','asd2','ofertas','Juegos','Categoria','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
        }else{
            return view('categoria', compact('ofertas','Juegos','Categoria','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
        }
    }

    function vistaPlataforma(Request $request, $id)
    {

        $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoCategoria = Categoria::all();
        $Plataforma=Plataforma::all()->where('id_plataforma', '=', $id)->first();
        $Juegos=DB::table('juegos_categoria')->distinct()->select('juegos.id_juego','juegos.nombre_juego','juegos.stock_juego','juegos.precio_juego','juegos.url_juego','plataformas.id_plataforma','plataformas.nombre_plataforma')->join('juegos','juegos.id_juego','juegos_categoria.id_juego')->join('plataformas','plataformas.id_plataforma','=','juegos.id_plataforma')->where('juegos.id_plataforma', '=', $id)->orderBy('stock_juego', 'DESC')->get();
        $Subs=Subcripcion::select("*")->join('plataformas','plataformas.id_plataforma','=','subscripciones.id_plataforma')->where('subscripciones.id_plataforma', '=', $id)->orderBy('stock_suscripcion', 'DESC')->get();
        $contJuegos=$Juegos->count();
        $contSubs=$Subs->count();
        
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");

            return view('plataforma', compact('User','asd','asd2','contJuegos','contSubs','Subs','asd','ofertas','Juegos','Plataforma','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
        }else{
            return view('plataforma', compact('contJuegos','contSubs','Subs','ofertas','Juegos','Plataforma','InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
        }
    }

    public function InfoUsuario(Request $request ,$id){
        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $nameUser = $InfoUser[0]->name;
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            $consulta = Juego::all()->sortByDesc('id_juego')->take(9);
            $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get();
            $populares = DB::table('populares')->join('juegos', 'juegos.id_juego', '=', 'populares.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'stock_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();
            return view('Perfil.configuracion', compact('User','nameUser','asd','asd2','idusuario','InfoUser', 'InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request', 'consulta', 'ofertas','populares'));
        }

      }
      public function indexOfertas(Request $request){


        if (Auth::user() != null) {
            $idusuario = Auth::user()->id;
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
            $nameUser = $InfoUser[0]->name;
            $User=$InfoUser[0];
            $asd = DB::select("SELECT carritos.id_carrito,juegos.id_juego, juegos.nombre_juego, juegos.precio_juego, juegos.url_juego, plataformas.nombre_plataforma FROM juegos, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_juego = juegos.id_juego and plataformas.id_plataforma = juegos.id_plataforma");
            $asd2 = DB::select("SELECT carritos.id_carrito, subscripciones.id_subscripcion, subscripciones.precio_subscripcion, subscripciones.tipo_subscripcion, subscripciones.url_subscripcion, plataformas.nombre_plataforma FROM subscripciones, carritos, plataformas WHERE carritos.id = '$idusuario' and carritos.id_subscripcion = subscripciones.id_subscripcion and plataformas.id_plataforma = subscripciones.id_plataforma");
            $consulta = Juego::all()->sortByDesc('id_juego')->take(9);
            /* $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
            ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get(); */
            $ofertas=DB::select("SELECT * FROM ofertas, promociones, juegos, plataformas where promociones.id_oferta=ofertas.id_oferta and juegos.id_juego = promociones.id_juego and juegos.id_plataforma = plataformas.id_plataforma");
            $populares = DB::table('populares')->join('juegos', 'juegos.id_juego', '=', 'populares.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'stock_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();
            $allJuegos = Juego::select('juegos.id_juego', 'juegos.nombre_juego', 'juegos.precio_juego', 'juegos.url_juego', 'plataformas.nombre_plataforma')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->simplepaginate(8);
            $InfoOfertas=DB::select("SELECT * FROM ofertas, promociones where promociones.id_oferta=ofertas.id_oferta");
            $ofertones=DB::SELECT("SELECT * FROM promociones P,ofertas O,JUEGOS J WHERE P.ID_OFERTA=O.ID_OFERTA AND P.ID_JUEGO=J.ID_JUEGO");
        
            return view('ofertas', compact('InfoOfertas','allJuegos','User','nameUser','asd','asd2','idusuario','InfoUser', 'InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request', 'consulta', 'ofertas','populares'));
        } else {
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
            $consulta = Juego::orderBy('id_juego','DESC')->take(8)->get();
            $contador = DB::table('promociones')->count("*");
            $populares = DB::table('populares')->join('juegos', 'juegos.id_juego', '=', 'populares.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.stock_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'stock_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();
            /* $ofertas = DB::table('promociones')->join('juegos', 'juegos.id_juego', '=', 'promociones.id_juego')
                ->join('ofertas', 'ofertas.id_oferta', '=', 'promociones.id_oferta')->get(); */
            $ofertas=DB::select("SELECT * FROM ofertas, promociones, juegos, plataformas where promociones.id_oferta=ofertas.id_oferta and juegos.id_juego = promociones.id_juego and juegos.id_plataforma = plataformas.id_plataforma");
            $InfoOfertas=DB::select("SELECT * FROM ofertas, promociones where promociones.id_oferta=ofertas.id_oferta");
            if ($contador == 0) {
                $ofertas = "no";
            }
            $allJuegos = Juego::select('juegos.id_juego', 'juegos.nombre_juego', 'juegos.precio_juego', 'juegos.url_juego', 'plataformas.nombre_plataforma')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->simplepaginate(8);
            $ofertones=DB::SELECT("SELECT * FROM promociones P,ofertas O,JUEGOS J WHERE P.ID_OFERTA=O.ID_OFERTA AND P.ID_JUEGO=J.ID_JUEGO");
             
           
            //dd($InfoPlataformaJ);
            return view('ofertas', compact('InfoOfertas','allJuegos','InfoPlataformaJ', 'InfoPlataformaS', 'InfoCategoria', 'request', 'consulta', 'ofertas', 'populares'));
        }
    }

}
