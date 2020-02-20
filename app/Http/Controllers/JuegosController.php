<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juego;

class JuegosController extends Controller
{
    function imagenesCarrusel(){
        $consulta= Juego::select('id_juego','nombre_juego', 'precio_juego', 'stock_juego', 'url_juego')->orderBy('id_juego','DESC')->limit(10);
        return($consulta);
    }
}
