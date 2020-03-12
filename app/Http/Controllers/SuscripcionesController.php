<?php

namespace App\Http\Controllers;
use App\Subcripcion;
use Illuminate\Http\Request;
use DataTables;

class SuscripcionesController extends Controller
{
    public function getSusAll()
    {
        $sus =  Subcripcion::join("plataformas",'plataformas.id_plataforma','=','subscripciones.id_plataforma')->select("subscripciones.id_subscripcion as id_sus", "subscripciones.tipo_subscripcion as tipo_sus","plataformas.nombre_plataforma as nombre_plataforma");

        return Datatables::of($sus)
            ->addColumn('action', function ($id_subscripcion) {
                return '<a href="/sus/' . $id_subscripcion->id_subscripcion . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_subscripcion) {
                $token =  csrf_field();

                return ' <form action="QuitarJuego" method="post" id="FormularioEliminarJuego" class="delete">  ' . $token . ' <input type="hidden" name="id_juego" id="id_juego" value=' .  $id_subscripcion->id_subscripcion . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar?`);" /><i class="fa fa-trash"></i></td>
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


        $sus = DB::table('subscripciones')->select("*")->where('id_subscripcion', '=', $id)->first();



        return view('suscripciones.editar', compact('sus', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

}
