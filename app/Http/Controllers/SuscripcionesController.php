<?php

namespace App\Http\Controllers;

use App\Plataforma;
use App\Codigo;
use App\Categoria;
use App\Subcripcion;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Http\Request;
use DataTables;
use Redirect;


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

                return ' <form action="QuitarSus" method="post" id="FormularioEliminarJuego" class="delete">  ' . $token . ' <input type="hidden" name="id_subscripcion" id="id_subscripcion" value=' .  $id_subscripcion->id_sus . '>
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

    public function updateSus(Request $request,$id_suscripcion)
    {


        $nuevoPlataforma = $_POST['tipo'];
        $nuevoPrecio = $_POST['precio'];
        $nuevoTipo = $_POST['descripcion'];


        if ($nuevoPlataforma != '' && $nuevoPrecio != ''  && $nuevoTipo != '') {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'precio_subscripcion' => $nuevoPrecio, 'tipo_subscripcion' => $nuevoTipo]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['url_subscripcion' => $archivo]);
            }
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Suscripcion Actualizada con Exito');
        }elseif($nuevoPrecio == ''  && $nuevoTipo != '' ) {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'tipo_subscripcion' => $nuevoTipo]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['url_subscripcion' => $archivo]);
            }
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Suscripcion Actualizada con Exito');
        }elseif($nuevoPrecio != ''  && $nuevoTipo == '' ) {
            DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['id_plataforma' => $nuevoPlataforma, 'precio_subscripcion' => $nuevoTipo]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['url_subscripcion' => $archivo]);
            }
            return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Suscripcion Actualizada con Exito');
        }elseif($request->file('imagen')){
            $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                DB::table('subscripciones')->where("id_subscripcion", "=", $id_suscripcion)->update(['url_subscripcion' => $archivo]);
                return redirect()->route('editarSus', $id_suscripcion)->with('mensaje', 'Suscripcion Actualizada con Exito');    
        }else{
            return redirect()->route('editarSus', $id_suscripcion);   
        }
    }


    public function agregar(Request $request)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $PlataformasAll = Plataforma::all();
        return view('suscripciones.crear', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request','PlataformasAll'));
    }

    public function insertar(Request $request)
    {


        $plataforma = $_POST['plataforma'];
        $precio = $_POST['precio'];
        $tipo = $_POST['descripcion'];
        $file = $request->file('imagen');
        if($plataforma != "0"){
        $name = time() . $file->getClientOriginalName();
        $url = "assets/media/juegos/" . $name;
        Storage::disk('public')->put($name, \File::get($file));
        Subcripcion::insert(
            [
                'id_plataforma' => $plataforma,
                'precio_subscripcion' => $precio,
                'url_subscripcion' => $url,
                'stock_suscripcion' => 0,
                'tipo_subscripcion' => $tipo
            ]
        );

        \Session::flash('mensaje', 'Suscripcion agregada con exito');

        return redirect()->route('ListaSus');
        }else{
            \Session::flash('mensaje2', 'Porfavor seleccione plataforma');

            return Redirect::back();
        }

    }

    public function QuitarSus(Request $request)
    {

        $id_Sus = $_POST['id_subscripcion'];
        
        DB::table('subscripciones')->where('id_subscripcion', '=', $id_Sus)->delete();
        DB::table('carritos')->where('id_subscripcion', '=', $id_Sus)->delete();
        DB::table('codigos')->where('id_subscripcion', '=', $id_Sus)->delete();


        \Session::flash('mensaje', 'Juego eliminado con exito');
        return redirect()->route('ListaSus'); 
    }






}
