<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Categoria;
use App\Plataforma;
use DB;
use DataTables;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function getOfertasAll()
    {
        $ofertas =  Oferta::select("id_oferta", "nombre_oferta","fecha_inicio","fecha_fin");

        return Datatables::of($ofertas)
            ->addColumn('action', function ($id_oferta) {
                return '<a href="/oferta/' . $id_oferta->id_oferta . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
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

    public function edit(Request $request, $id)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
      

        $ofertas = DB::table('ofertas')->join("promociones", 'promociones.id_oferta', '=', 'ofertas.id_oferta')->select("*")->where('id_oferta', '=', $id)->get();
        

        return view('suscripciones.editar', compact('ofertas', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

}
