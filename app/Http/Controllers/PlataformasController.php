<?php

namespace App\Http\Controllers;

use App\Plataforma;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Categoria;

class PlataformasController extends Controller
{
    public function getPlataformaAll()
    {
        $plataformas =  Plataforma::select("id_plataforma", "nombre_plataforma");

        return Datatables::of($plataformas)
            ->addColumn('action', function ($id_plataforma) {
                return '<a href="/plataforma/' . $id_plataforma->id_plataforma . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_plataforma) {
                $token =  csrf_field();

                return ' <form action="QuitarPlataforma" method="post" id="FormularioEliminarPlataforma" class="delete">  ' . $token . ' <input type="hidden" name="id_plataforma" id="id_plataforma" value=' .  $id_plataforma->id_plataforma  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar?`);" /><i class="fa fa-trash"></i></td>
            </form>
            ';
            })

            ->rawColumns(['action2' => 'action2', 'action' => 'action'])
            ->make(true);
    }

    public function edit(Request $request, $id_plataforma)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();


        $nombre_plataforma = DB::table('plataformas')->select("*")->where('id_plataforma', '=', $id_plataforma)->first();



        return view('plataforma.editar', compact('nombre_plataforma', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function update($id_plataforma)
    {

        $nuevoNombre = $_GET['nombre'];
      
        DB::table('plataformas')->where("id_plataforma", "=", $id_plataforma)->update(['nombre_plataforma' => $nuevoNombre]);
        return redirect()->route('agregarPlataforma')->with('mensaje', 'Plataformas Modificado con exito');
    }


    public function QuitarPlataforma(Request $request)
    {

        $id_plataforma = $_POST['id_plataforma'];
     
        $contador = DB::table('juegos')->select(DB::raw('count(*) as contador '))->where('id_plataforma', "=", $id_plataforma)->get();
        $contador2 = DB::table('subscripciones')->select(DB::raw('count(*) as contador '))->where('id_plataforma', "=", $id_plataforma)->get();
       
        if (($contador[0]->contador == 0) && ($contador2[0]->contador == 0)) {
            DB::table('plataformas')

                ->where('id_plataforma', '=', $id_plataforma)
                ->delete();


            \Session::flash('mensaje', 'Plataforma eliminado con exito');


            return redirect()->route('agregarPlataforma');
        }else{
            \Session::flash('mensaje2', 'La Plataforma no se puede eliminar porque algunos datos ocupan esta catagoria');
            return redirect()->route('agregarPlataforma'); 
        }
    }

    public function agregar(Request $request)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

        return view('plataforma.crear', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function insertar(Request $request)
    {

        $nombre = $_POST['plataforma'];

        Plataforma::insert(
            ['nombre_plataforma' => $nombre]
        );

        \Session::flash('mensaje', 'Plataforma agregada con exito');

        return redirect()->route('agregarPlataforma');
    }
}
