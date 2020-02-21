<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\Plataforma;
use App\Juego;
use App\Subcripcion;
use DB;

class VistasController extends Controller
{
    public function inicio(Request $request){
        if(Auth::user() != null){
            $idusuario = Auth::user()->id;
            $InfoCategoria = Categoria::all();
            $InfoPlataforma = Plataforma::all();
            $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
            $nameUser = $InfoUser[0]->name;
            $consulta = Juego::all()->sortByDesc('id_juego')->take(10);
            session(['identificador' => $idusuario]);
            session(['nombre' => $nameUser]);
            return view('inicio', compact('InfoUser', 'InfoPlataforma', 'InfoCategoria','request','consulta'));
        }else{
            $InfoCategoria = Categoria::all();
            $InfoPlataforma = Plataforma::all();
            $consulta = Juego::all()->sortByDesc('id_juego')->take(10);

            return view('inicio', compact('InfoPlataforma', 'InfoCategoria','request','consulta'));

        }

    }

    function vistajuego(Request $request){
        $nombre=$request->get('buscador');
        $InfoJuego = Juego::where('nombre_juego','like',"%$nombre%")->paginate(5);
        $allJuegos=Juego::all();
        $categoria=$request->get('tipo');
        $CategoriaJuegos = DB::select("SELECT juegos_categoria.id_categoria FROM juegos_categoria");
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
       // dd($InfoUser);
        return view('juegos',compact('InfoJuego','allJuegos','InfoCategoria','InfoPlataforma','request'))->withJuego($InfoJuego);
    }

    function vistaSubcripcion(Request $request){
        $nombre=$request->get('buscador');
        $InfoSubcripcion = Subcripcion::where('tipo_subscripcion','like',"%$nombre%")->paginate(5);
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        return view('subcripciones', compact('InfoSubcripcion','InfoPlataforma', 'InfoCategoria','request'));
    }
    function vistaReview(Request $request,$id){
        $InfoJuego=Juego::all()->where('id_juego',$id)->first();
        $CategoriaJuego = DB::select("SELECT juegos_categoria.id_categoria FROM juegos_categoria WHERE juegos_categoria.id_juego = $id");
        $id_categoria=$CategoriaJuego[0]->id_categoria;
        $Categoria=Categoria::all()->where('id_categoria',$id_categoria);
        $InfoPlataforma = Plataforma::all();
        $InfoCategoria=Categoria::all();
        return view('reviewProducto',compact('CategoriaJuego','InfoJuego','InfoCategoria','Categoria','InfoPlataforma','request'));
    }
    function vistaReviewSub(Request $request,$id){
        $InfoSubcripcion= Subcripcion::all()->where('id_subscripcion',$id)->first();
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        return view('reviewSub',compact('InfoSubcripcion','InfoCategoria','InfoPlataforma','request'));
    }


    function registrar(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();

       // dd($InfoUser);
        return view('registro',compact('InfoCategoria','InfoPlataforma','request'));
    }


}
