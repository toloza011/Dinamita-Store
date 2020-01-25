<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Plataforma;
use App\User;

class tablaController extends Controller
{
    public function inicio(){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        
        $InfoUser = null;
       // dd($InfoUser);
        return view('layout',compact('InfoCategoria','InfoPlataforma','InfoUser'));
    }
}
