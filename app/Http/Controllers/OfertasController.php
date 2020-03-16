<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Categoria;
use App\Juego;
use App\Plataforma;
use App\Promociones;
use DB;
use DataTables;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function getOfertasAll()
    {
        $ofertas =  Oferta::select("id_oferta", "nombre_oferta", "fecha_inicio", "fecha_fin");

        return Datatables::of($ofertas)
            ->addColumn('action', function ($id_oferta) {
                return '<a href="/oferta/' . $id_oferta->id_oferta . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_oferta) {
                $token =  csrf_field();

                return ' <form action="QuitarOferta" method="post" id="FormularioEliminarJuego" class="delete">  ' . $token . ' <input type="hidden" name="id_oferta" id="id_oferta" value=' .  $id_oferta->id_oferta  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar ' .  $id_oferta->nombre_oferta  . '?`);" /><i class="fa fa-trash"></i></td>
            </form>
            ';
            })

            ->rawColumns(['action2' => 'action2', 'action' => 'action'])
            ->make(true);
    }

    public function getOfertasJuegosAll($id)
    {
        $juegosOferta =  Oferta::join("promociones", "promociones.id_oferta", "=", "ofertas.id_oferta")->join("juegos", "juegos.id_juego", "promociones.id_juego")->where("ofertas.id_oferta", "=", $id)->get();

        return Datatables::of($juegosOferta)->addColumn('action2', function ($id_juego) {
            $token2 =  csrf_field();

            return ' <form action="'. route("editarPorcentaje") .'" method="post" id="EditarJuego"> ' . $token2 . ' <input type="number" name="porcentaje" id="porcentaje" value=' .  $id_juego->descuento  . '><input type="hidden" name="id_juego" id="id_juego" value=' .  $id_juego->id_juego  . '>
        <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-dark" /><i class="fa fa-save"></i></td>
        </form>
        ';
        })->rawColumns(['action2' => 'action2'])->make(true);
    }





    public function edit(Request $request, $id)
    {
        $juegosAll = Juego::all();
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $juegosDanger = Promociones::where("id_oferta","<>",$id)->get();
        //dd($juegosDanger);
        $oferta = DB::table('ofertas')->select("*")->where('id_oferta', '=', $id)->first();
        $juegosofertas = DB::table('promociones')->join("juegos", "juegos.id_juego", "=", "promociones.id_juego")->select("*")->where('id_oferta', '=', $id)->get();


        return view('ofertas.editar', compact('oferta', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request', 'juegosofertas', 'juegosAll','juegosDanger'));
    }


    public function updateOferta(Request $request, $id_oferta)
    {


        $nuevoNombre = $_POST['nombre'];
        $nuevaDescripcion = $_POST['descripcion'];
        $nuevoFechaFin = $_POST['fecha_f'];
        $juegos = $request->juegos;
        $juegosOld = $request->juegosOferta;

        //dd($juegosOld);
        DB::table('ofertas')->where("id_oferta", "=", $id_oferta)->update(['nombre_oferta' => $nuevoNombre, 'descripcion_oferta' => $nuevaDescripcion, 'fecha_fin' => $nuevoFechaFin]);
        if($juegos == ''){
            DB::table('promociones')->where('id_oferta', '=', $id_oferta)->delete();
            return redirect()->route('editarOferta', $id_oferta)->with('mensaje', 'Oferta actualizado con exito');
        }
        if ($juegosOld != $juegos) {

            $descuento = DB::table('promociones')->select("id_juego", "descuento")->where('id_oferta', '=', $id_oferta)->get();
            DB::table('promociones')->where('id_oferta', '=', $id_oferta)->delete();
            foreach ($juegos as $item) {
                $aux = 0;
                foreach ($descuento as $x) {
                    if ($x->id_juego == $item ) {
                        Promociones::insert(
                            [

                                'id_oferta' => $id_oferta,
                                'id_juego' => $item,
                                'descuento' => $x->descuento

                            ]
                        );
                        $aux=1;
                    } 
                }
                if ($aux == 0) {
                    Promociones::insert(
                        [
                            'id_oferta' => $id_oferta,
                            'id_juego' => $item,
                            'descuento' => 0
                        ]
                    );
                   
                }

            }
            
            return redirect()->route('editarOferta', $id_oferta)->with('mensaje', 'Oferta actualizado con exito');
        } else {
            return redirect()->route('editarOferta', $id_oferta)->with('mensaje', 'Oferta actualizado con exito');
        }
    }

    public function editarPorcentaje(){

        $nuevoPorcentaje = $_POST['porcentaje']; 
        $id_juego = $_POST['id_juego'];
        $id_oferta = DB::table('promociones')->select("id_oferta")->where("id_juego", "=", $id_juego)->first();
       //dd($id_oferta->id_oferta);
        DB::table('promociones')->where("id_juego", "=", $id_juego)->update(['descuento' => $nuevoPorcentaje]);
        
        return redirect()->route('editarOferta', $id_oferta->id_oferta)->with('mensaje', 'Oferta actualizado con exito');
    }

    public function agregar(Request $request)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

        return view('ofertas.crear', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }


    public function insertar(Request $request)
    {


        $nombre = $_POST['nombre'];
        $fecha_fin = $_POST['fecha_f'];
        $descripcion = $_POST['descripcion'];

        Oferta::insert(
            [
                'nombre_oferta' => $nombre,
                'fecha_fin' => $fecha_fin,
                'descripcion_oferta' => $descripcion
            ]
        );
        $ultimaID = DB::table('ofertas')->select('id_oferta')->orderBy('id_oferta', 'DESC')->limit(1)->get();
      
        //$ultimaID[0]->id_juego


        \Session::flash('mensaje', 'Oferta agregada con exito');

        return redirect()->route('editarOferta',$ultimaID[0]->id_oferta);
    }

    public function QuitarOferta(Request $request)
    {

        $id_oferta = $_POST['id_oferta'];

        DB::table('promociones')->where('id_oferta', '=', $id_oferta)->delete();
        DB::table('ofertas')->where('id_oferta', '=', $id_oferta)->delete();
       


        \Session::flash('mensaje', 'Oferta eliminado con exito');
        return redirect()->route('ListaOfertas'); 
    }







        


    




}
