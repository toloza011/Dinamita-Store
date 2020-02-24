<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use Redirect;

class CarritoController extends Controller
{
   public function index(Request $request,$id){
      $id_usuario = $request->session()->get('identificador');
      Carrito::insert(
         ['id'=> $id_usuario,'id_juego'=> $id]
     );
     return Redirect::back();
   }
}
