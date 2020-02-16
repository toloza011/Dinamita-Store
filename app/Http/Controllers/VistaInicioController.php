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
    public function index(Request $request){
        $idusuario = Auth::user()->id;
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
        
        $nameUser = $InfoUser[0]->name;
        session(['identificador' => $idusuario]);
        session(['nombre' => $nameUser]);
        
     /*    return $request->session()->all(); */

        return view('inicio', compact('InfoUser', 'InfoPlataforma', 'InfoCategoria','request')); 
        
    }

    function registrar(){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        
        $InfoUser = DB::select("SELECT users.id, users.name, users.email FROM users WHERE users.id = '$idusuario' ");
       // dd($InfoUser);
        return view('registro',compact('InfoCategoria','InfoPlataforma','InfoUser'));
    }

    function vistajuego(Request $request){
       
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        //dd($request);
        $request=$request;
       
       
        
       // dd($InfoUser);
        return view('juegos',compact('InfoCategoria','InfoPlataforma','request'));
    }
}
