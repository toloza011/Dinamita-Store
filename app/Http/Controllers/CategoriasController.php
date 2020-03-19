<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use DataTables;
use App\Plataforma;
use DB;

class CategoriasController extends Controller
{
    public function getCategoriaAll()
    {
        $categorias =  Categoria::select("id_categoria", "nombre_categoria");

        return Datatables::of($categorias)
            ->addColumn('action', function ($id_categoria) {
                return '<a href="/categoria/' . $id_categoria->id_categoria . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_categoria) {
                $token =  csrf_field();

                return ' <form action="QuitarCategoria" method="post" id="FormularioEliminarCategoria" class="delete">  ' . $token . ' <input type="hidden" name="id_categoria" id="id_categoria" value=' .  $id_categoria->id_categoria  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar ' .  $id_categoria->nombre_categoria  . '?`);" /><i class="fa fa-trash"></i></td>
            </form>
            ';
            })

            ->rawColumns(['action2' => 'action2', 'action' => 'action'])
            ->make(true);
    }

    public function edit(Request $request, $id_categoria)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();


        $nombre_categoria = DB::table('categorias')->select("*")->where('id_categoria', '=', $id_categoria)->first();



        return view('categoria.editar', compact('nombre_categoria', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function update($id_categoria)
    {

        $nuevoNombre = $_GET['nombre'];

        DB::table('categorias')->where("id_categoria", "=", $id_categoria)->update(['nombre_categoria' => $nuevoNombre]);
        return redirect()->route('agregar')->with('mensaje', 'Categoria Modificado con exito');
    }


    public function QuitarCategoria(Request $request)
    {

        $id_categoria = $_POST['id_categoria'];
        $contador = DB::table('juegos_categoria')->select(DB::raw('count(*) as contador '))->where('id_categoria', "=", $id_categoria)->get();
       
        if ($contador[0]->contador == 0) {
            DB::table('categorias')

                ->where('id_categoria', '=', $id_categoria)
                ->delete();


            \Session::flash('mensaje', 'Categoria eliminado con exito');


            return redirect()->route('agregar');
        }else{
            \Session::flash('mensaje2', 'La Catagoria no se puede eliminar porque algunos datos ocupan esta catagoria');
            return redirect()->route('agregar'); 
        }
    }

    public function agregar(Request $request)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        return view('categoria.crear', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function insertar(Request $request)
    {

        $nombre = $_POST['categoria'];

        Categoria::insert(
            ['nombre_categoria' => $nombre]
        );

        \Session::flash('mensaje', 'Categoria agregada con exito');

        return redirect()->route('agregar');
    }
}
