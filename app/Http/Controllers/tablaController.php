<?php

namespace App\Http\Controllers;
use App\prueba;
use Illuminate\Http\Request;

class tablaController extends Controller
{
    public function inicio(){
        $numero =  prueba::all();
       //dd($numero[0]['a']);
        return view('fotos',compact('numero'));
    }
}
