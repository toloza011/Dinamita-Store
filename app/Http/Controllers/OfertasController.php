<?php

namespace App\Http\Controllers;

use App\Oferta;
use DataTables;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function getOfertasAll()
    {
        $ofertas =  Oferta::select("id_oferta", "nombre_oferta");

        return Datatables::of($ofertas)
            ->addColumn('action', function ($id_oferta) {
                return '<a href="/juego/' . $id_oferta->id_oferta . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_oferta) {
                $token =  csrf_field();

                return ' <form action="QuitarJuego" method="post" id="FormularioEliminarJuego" class="delete">  ' . $token . ' <input type="hidden" name="id_oferta" id="id_oferta" value=' .  $id_oferta->id_oferta  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar ' .  $id_oferta->nombre_oferta  . '?`);" /><i class="fa fa-trash"></i></td>
            </form>
            ';
            })

            ->rawColumns(['action2' => 'action2', 'action' => 'action'])
            ->make(true);
    }
}
