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
        $InfoJuego=Juego::orderBy('id_juego','DESC')->paginate(12);
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
       // dd($InfoUser);
        return view('juegos',compact('InfoJuego','InfoCategoria','InfoPlataforma','request'));
    }

    function vistaSubcripcion(Request $request){
        $InfoSubcripcion=Subcripcion::orderBy('id_subscripcion','DESC')->paginate(12);
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        return view('subcripciones', compact('InfoSubcripcion','InfoPlataforma', 'InfoCategoria','request'));
    }
    function vistaReview(Request $request,$id){
        $InfoSubcripcion= Subcripcion::all()->where('id_subscripcion',$id)->first();
        $InfoJuego=Juego::all()->where('id_juego',$id)->first();
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        return view('reviewProducto',compact('InfoSubcripcion','InfoJuego','InfoCategoria','InfoPlataforma','request'));
    }


    function registrar(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        
       // dd($InfoUser);
        return view('registro',compact('InfoCategoria','InfoPlataforma','request'));
    }


}
