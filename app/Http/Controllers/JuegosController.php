<?php

namespace App\Http\Controllers;

use App\Plataforma;
use App\Categoria;

use App\Codigo as AppCodigo;
use Illuminate\Http\Request;
use App\Juego;
use DB;
use DataTables;
use App\Codigo;
use App\Imagenes;
use App\Juegos_categoria;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class JuegosController extends Controller
{
    function imagenesCarrusel()
    {
        $consulta = Juego::select('id_juego', 'nombre_juego', 'precio_juego', 'stock_juego', 'url_juego')->orderBy('id_juego', 'DESC')->limit(10);
        return ($consulta);
    }

    public function getJuegosAll()
    {
        $juegos =  Juego::select("id_juego", "nombre_juego");

        return Datatables::of($juegos)
            ->addColumn('action', function ($id_juego) {
                return '<a href="/juego/' . $id_juego->id_juego . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id_juego) {
                $token =  csrf_field();

                return ' <form action="QuitarJuego" method="post" id="FormularioEliminarJuego" class="delete">  ' . $token . ' <input type="hidden" name="id_juego" id="id_juego" value=' .  $id_juego->id_juego  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar ' .  $id_juego->nombre_juego  . '?`);" /><i class="fa fa-trash"></i></td>
            </form>
            ';
            })

            ->rawColumns(['action2' => 'action2', 'action' => 'action'])
            ->make(true);
    }

    public function edit(Request $request, $id_juego)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $juegoCategorias = DB::table('juegos_categoria')->join("juegos","juegos.id_juego","=","juegos_categoria.id_juego")->join("categorias","categorias.id_categoria","=","juegos_categoria.id_categoria")->select("*")->where('juegos.id_juego','=',$id_juego)->get();
        $categoriasDanger = Juegos_categoria::where("id_juego","<>",$id_juego)->get();
        $nombre_juego = DB::table('juegos')->select("*")->join('plataformas','plataformas.id_plataforma','=','juegos.id_plataforma')->where('id_juego', '=', $id_juego)->first();
        $PlataformasAll = Plataforma::all();

        return view('juegos.editar', compact('nombre_juego', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS','PlataformasAll','juegoCategorias','categoriasDanger' , 'request'));
    }

    public function updateStock($id_juego)
    {
        $codigos = Codigo::select('codigos.codigo')->where('id_juego', '=', $id_juego)->get();
        $codigo = $_POST['codigo'];
        foreach($codigos as $item){
                if($codigo == $item->codigo){
                return redirect()->route('editarJuego', $id_juego)->with('mensaje', 'El codigo esta repetido');
                }
            }
        Codigo::insert(
            [
                'codigo' => $codigo,
                'id_juego' => $id_juego
            ]
        );

        $stock = DB::table('juegos')->where("id_juego", "=", $id_juego)->select('stock_juego')->get();
        //dd($stock[0]->stock_juego);
        $stock[0]->stock_juego += 1;

        DB::table('juegos')->where("id_juego", "=", $id_juego)->update(['stock_juego' => $stock[0]->stock_juego]);


        return redirect()->route('editarJuego', $id_juego)->with('mensaje', 'Codigo Agregado Con Exito');
    }

    public function updateNombreJ(Request $request, $id_juego)
    {
        $nuevoPrecio = $_POST['precio'];
        $nuevoNombre = $_POST['nombre'];
        $nuevaPlataforma = $_POST['tipo'];
        $file = $request->file('imagen');
        $categorias = $request->categorias;
        $categoriasold = $request->categoriasJuego;
        if($nuevoNombre != '' && $nuevoPrecio != ''){
            DB::table('juegos')->where("id_juego", "=", $id_juego)->update(['nombre_juego' => $nuevoNombre,'precio_juego' => $nuevoPrecio,'id_plataforma' => $nuevaPlataforma]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                Imagenes::insert(
                    [
                        'id_juego' => $id_juego,
                        'url' => $archivo
                    ]
                );

            }
            if ($categoriasold != $categorias) {
                    DB::table('juegos_categoria')->where('id_juego', '=', $id_juego)->delete();
                    foreach ($categorias as $item) {
                            Juegos_categoria::insert(
                                [
                                    'id_juego' => $id_juego,
                                    'id_categoria' => $item,
                                ]
                            );

                        }

                    }
            return redirect()->route('editarJuego', $id_juego)->with('mensaje', 'Juego actualizado con exito');
        }else if($nuevoPrecio == '' && $nuevoNombre != ''){
            DB::table('juegos')->where("id_juego", "=", $id_juego)->update(['nombre_juego' => $nuevoNombre,'id_plataforma' => $nuevaPlataforma]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                Imagenes::insert(
                    [
                        'id_juego' => $id_juego,
                        'url' => $archivo
                    ]
                );
            }
            if ($categoriasold != $categorias) {
                DB::table('juegos_categoria')->where('id_juego', '=', $id_juego)->delete();
                foreach ($categorias as $item) {
                        Juegos_categoria::insert(
                            [
                                'id_juego' => $id_juego,
                                'id_categoria' => $item,
                            ]
                        );

                    }

                }
            return redirect()->route('editarJuego', $id_juego)->with('mensaje', 'Nombre actualizado con exito');
        }else if($nuevoPrecio != ''  && $nuevoNombre == ''){
            DB::table('juegos')->where("id_juego", "=", $id_juego)->update(['precio_juego' => $nuevoPrecio,'id_plataforma' => $nuevaPlataforma,]);
            if($request->file('imagen')){
                $file = $request->file('imagen');
                $name = time() . $file->getClientOriginalName();
                $archivo = "assets/media/juegos/" . $name;
                Storage::disk('public')->put($name, \File::get($file));
                Imagenes::insert(
                    [
                        'id_juego' => $id_juego,
                        'url' => $archivo
                    ]
                );
            }
            if ($categoriasold != $categorias) {
                DB::table('juegos_categoria')->where('id_juego', '=', $id_juego)->delete();
                foreach ($categorias as $item) {
                        Juegos_categoria::insert(
                            [
                                'id_juego' => $id_juego,
                                'id_categoria' => $item,
                            ]
                        );

                    }

                }
            return redirect()->route('editarJuego', $id_juego)->with('mensaje', 'Precio actualizado con exito');
        }
    }

    public function agregar(Request $request)
    {

        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();


        return view('juegos.crear', compact('InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function insertar(Request $request)
    {


        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $plataforma = $_POST['plataforma'];
        $descripcion = $_POST['descripcion'];
        $file = $request->file('imagen');
        $name = time() . $file->getClientOriginalName();
        $url = "assets/media/juegos/" . $name;

        Storage::disk('public')->put($name, \File::get($file));
        Juego::insert(
            [
                'nombre_juego' => $nombre,
                'precio_juego' => $precio,
                'id_plataforma' => $plataforma,
                'url_juego' => $url,
                'stock_juego' => 0,
                'descripcion_juego' => $descripcion
            ]
        );
        $ultimaID = DB::table('juegos')->select('id_juego')->orderBy('id_juego', 'DESC')->limit(1)->get();
        foreach ($request->categoria as $item) {
            $categoria = $item;
            //dd($categoria);
            Juegos_categoria::insert(
                [
                    'id_juego' => $ultimaID[0]->id_juego,
                    'id_categoria' => $categoria,

                ]
            );
        }




        \Session::flash('mensaje', 'Juego agregada con exito');

        return redirect()->route('ListaJuegos');
    }


    public function QuitarJuego(Request $request)
    {

        $id_juego = $_POST['id_juego'];

        DB::table('juegos')->where('id_juego', '=', $id_juego)->delete();
        DB::table('juegos_categoria')->where('id_juego', '=', $id_juego)->delete();
        DB::table('imagenes')->where('id_juego', '=', $id_juego)->delete();
        DB::table('carritos')->where('id_juego', '=', $id_juego)->delete();
        DB::table('codigos')->where('id_juego', '=', $id_juego)->delete();
        DB::table('promociones')->where('id_juego', '=', $id_juego)->delete();


        \Session::flash('mensaje', 'Juego eliminado con exito');
        return redirect()->route('ListaJuegos');
    }
}
