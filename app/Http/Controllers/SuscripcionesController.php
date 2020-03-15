<?php

namespace App\Http\Controllers;

use App\Plataforma;
use App\Codigo;
use App\Categoria;
use App\Subcripcion;
use DB;
use Illuminate\Http\Request;
use DataTables;


class SuscripcionesController extends Controller
{
    public function getSusAll()
    {
        $sus =  Subcripcion::join("plataformas", 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->select("subscripciones.id_subscripcion as id_sus", "subscripciones.tipo_subscripcion as tipo_sus", "plataformas.nombre_plataforma as nombre_plataforma");

        return Datatables::of($sus)
            ->addColumn('action', function ($id_subscripcion) {
                return '<a href="/sus/' . $id_subscripcion->id_sus . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
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
        $InfoPlataformaAll = Plataforma::all();

        $sus = DB::table('subscripciones')->join("plataformas", 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->select("*")->where('id_subscripcion', '=', $id)->first();


        return view('suscripciones.editar', compact('sus', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request', 'InfoPlataformaAll'));
    }


    public function updateStock($id_suscripcion)
    {

        $codigo = $_POST['codigo'];



        Codigo::insert(
            [
                'codigo' => $codigo,
                'id_subscripcion' => $id_suscripcion
            ]
        );

        $stock = DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->select('stock_suscripcion')->get();
        //dd($stock[0]->stock_juego);
        $stock[0]->stock_suscripcion += 1;

        DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['stock_suscripcion' => $stock[0]->stock_suscripcion]);


        return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Codigo Agregado Con Exito');
    }

    public function updateSus($id_suscripcion)
    {


        $nuevoPlataforma = $_POST['tipo'];
        $nuevoPrecio = $_POST['precio'];
        $nuevoTipo = $_POST['descripcion'];
        if ($nuevoPlataforma != '' && $nuevoPrecio != ''  && $nuevoTipo != '') {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'precio_subscripcion' => $nuevoPrecio, 'tipo_subscripcion' => $nuevoTipo]);
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Nombre Actualizado con Exito');
        }elseif($nuevoPrecio == ''  && $nuevoTipo != '' ) {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'tipo_subscripcion' => $nuevoTipo]);
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Nombre Actualizado con Exito');
        }elseif($nuevoPrecio != ''  && $nuevoTipo == '' ) {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'tipo_subscripcion' => $nuevoTipo]);
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Nombre Actualizado con Exito');
        }
    }
}
