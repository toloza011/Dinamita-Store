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
        

        return view('inicio', compact('InfoUser', 'InfoPlataforma', 'InfoCategoria'));
    }

    function registrar(){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        
        $InfoUser = null;
       // dd($InfoUser);
        return view('registro',compact('InfoCategoria','InfoPlataforma','InfoUser'));
    }
}
