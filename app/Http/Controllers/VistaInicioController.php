<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\Plataforma;
use DB;


class VistaInicioController extends Controller
{

    function registrar(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();

        return view('registro',compact('InfoCategoria','InfoPlataforma','request'));
    }

    function vistajuego(Request $request){

        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();

     
        return view('juegos',compact('InfoCategoria','InfoPlataforma','request'));
    }
    function vistaSubcripcion(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
      
        return view('subcripciones', compact('InfoPlataforma', 'InfoCategoria','request'));


    }
}
