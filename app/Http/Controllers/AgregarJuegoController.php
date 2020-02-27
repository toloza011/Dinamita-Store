<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Categoria;

use Illuminate\Http\Request;

class AgregarJuegoController extends Controller
{
    public function getTableAll()
    {
        $tabla = Categoria::all();
        dd($tabla);
        return Datatables::of($tabla);
        /* ->addColumn('action', function ($id_categoria) {
            return '<a href="/Agregar' . $id_categoria->id_categoria . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
        })

        ->addColumn('action2', function ($id_cliente) {
            $token =  csrf_field();

            return '
            <form action="QuitarCliente" method="post" id="FormularioEliminarCliente" class="delete">  '.$token.' <input type="hidden" name="id_cliente" id="id_cliente" value='. $id_cliente->id_cliente .'>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar?`);" /><i class="fa fa-trash"></i></td>
            </form>'; 

            
            })
          
        ->rawColumns(['action2' => 'action2','action' => 'action'])
        ->make(true); */
    }
}
