<?php

namespace App\Http\Controllers\Auth;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Plataforma;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use App\Juego;

class LoginController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        /* $this->middleware('guest', ['only' => 'showLoginForm']); */
    }
    public function showLoginForm(Request $request){
        $InfoCategoria=Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma','plataformas.nombre_plataforma')->join('juegos','plataformas.id_plataforma','=','juegos.id_plataforma')->groupBy('id_plataforma','nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma','plataformas.nombre_plataforma')->join('subscripciones','plataformas.id_plataforma','=','subscripciones.id_plataforma')->groupBy('id_plataforma','nombre_plataforma')->get();
        return view('login',compact('InfoCategoria','InfoPlataformaJ','InfoPlataformaS','request'));
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials, $request->has('remember')))
        {   $idusuario = Auth::user()->id;
            $InfoCategoria = Categoria::all();
            $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma','plataformas.nombre_plataforma')->join('juegos','plataformas.id_plataforma','=','juegos.id_plataforma')->groupBy('id_plataforma','nombre_plataforma')->get();
            $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma','plataformas.nombre_plataforma')->join('subscripciones','plataformas.id_plataforma','=','subscripciones.id_plataforma')->groupBy('id_plataforma','nombre_plataforma')->get();
            $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
            $nameUser = $InfoUser[0]->name;
            $consulta = Juego::all()->sortByDesc('id_juego')->take(9);
            $contador = DB::table('promociones')->count("*");
            $ofertas = DB::table('promociones')->join('juegos','juegos.id_juego','=','promociones.id_juego')
                                                ->join('ofertas','ofertas.id_oferta','=','promociones.id_oferta')->get();
            $populares = DB::table('ventas')->join('codigos', 'codigos.id_codigo', '=', 'ventas.id_codigo')->join('juegos', 'juegos.id_juego', '=', 'codigos.id_juego')->join('plataformas', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->select('juegos.id_juego', 'juegos.nombre_juego', 'juegos.url_juego', 'juegos.precio_juego', 'plataformas.nombre_plataforma', DB::raw('count(*) as totalV'))->groupBy('id_juego', 'nombre_juego', 'url_juego', 'precio_juego', 'nombre_plataforma')->orderBy('totalV', 'DESC')->take(4)->get();
            session(['identificador' => $idusuario]);
            session(['nombre' => $nameUser]);
            if($contador == 0){
                $ofertas = "no";
            }
            return view('inicio', compact('InfoUser', 'InfoPlataformaJ','InfoPlataformaS', 'InfoCategoria','request','consulta','ofertas','populares'));
        }
        return back()   ->withErrors(['email'=>'Estas credenciales no coinciden con nuestros registros'])
                        ->withInput(request(['email']));

        /* $request->session()->flush() ; */
        /* $request->session()->get('key');
            return $request->session()->all();*/
    }


    public function logout(Request $request){

        $request->session()->flush();



        return redirect()->route('home');

    }

}
