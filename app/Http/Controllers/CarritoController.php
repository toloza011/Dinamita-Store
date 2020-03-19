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
      Carrito::insert(['id'=> $id_usuario,'id_juego'=> $id]);
      //necesitamos validacion de la ruta
      \Session::flash('mensaje', 'El producto se agregó al carrito');
      return Redirect::back();
   }
   public function delete(Request $request,$id){
      DB::table('carritos')->where('id_carrito', '=',$id)->delete();
      //necesitamos validacion de la ruta
      \Session::flash('mensaje2', 'El producto se eliminó del carrito');
      return Redirect::back();
   }
   public function insert_subscripcion(Request $request,$id){
      $id_usuario = $request->session()->get('identificador');
      Carrito::insert(['id'=> $id_usuario,'id_subscripcion'=> $id]);
      //necesitamos validacion de la ruta
      \Session::flash('mensaje', 'El producto se agregó al carrito');
      return Redirect::back();
   }
}
