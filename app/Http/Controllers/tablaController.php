<?php

namespace App\Http\Controllers;
use App\prueba;
use Illuminate\Http\Request;

class tablaController extends Controller
{
    public function inicio(){
        return view('layout',compact('numero'));
    }
}
