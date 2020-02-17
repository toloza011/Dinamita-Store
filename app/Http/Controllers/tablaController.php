<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Plataforma;
use App\User;

class tablaController extends Controller
{
    public function inicio(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataforma = Plataforma::all();
        $request=$request;
       // dd($InfoUser);
        return view('inicio',compact('InfoCategoria','InfoPlataforma','request'));
    }
    
   


}
