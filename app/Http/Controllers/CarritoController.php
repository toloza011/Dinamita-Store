<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrito;
use Redirect;
use DB;

class CarritoController extends Controller
{
   public function index(Request $request,$id){
      $id_usuario = $request->session()->get('identificador');
      Carrito::insert(
         ['id'=> $id_usuario,'id_juego'=> $id]
      );
      //necesitamos validacion de la ruta
      return Redirect::back();
   }
   public function delete(Request $request,$id){
      DB::table('carritos')->where('id_carrito', '=',$id)->delete();
      //necesitamos validacion de la ruta
      return Redirect::back();
   }
}
