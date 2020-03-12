<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Categoria;
use App\Plataforma;
use App\Juego;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Session\Middleware\AuthenticateSession;


class UserController extends Controller
{
    public function getUserAll()
    {
        $Users =  User::select("id", "name","email");

        return DataTables::of($Users)
            ->addColumn('action', function ($id) {
                return '<a href="/users/' . $id->id . '/editar" class="btn btn-dark"><i class="fa fa-edit"></i></a></button>';
            })

            ->addColumn('action2', function ($id) {
                $token =  csrf_field();

                return ' <form action="QuitarUsuario" method="post" id="FormularioEliminarUsuario" class="delete">  ' . $token . ' <input type="hidden" name="id" id="id" value=' .  $id->id  . '>
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
        $idusuario = Auth::user()->id;
            $InfoUser = DB::select("SELECT users.id, users.name, users.email, users.password FROM users WHERE users.id = '$idusuario' ");
            $User=$InfoUser[0];
        $usuario = DB::table('users')->select("*")->where('id', '=', $id)->first();

        return view('users.editar', compact('usuario','User', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function update($id)
    {

        $nuevoNombre = $_GET['nombre'];
        $nuevoCorreo = $_GET['email'];

        DB::table('users')->where("id", "=", $id)->update(['name' => $nuevoNombre,'email'=>$nuevoCorreo]);
        return redirect()->route('ListaUsuarios')->with('mensaje', 'Usuario Modificado con exito');
    }

    public function QuitarPlataforma(Request $request)
    {

        $id = $_POST['id'];

            DB::table('users')

                ->where('id', '=', $id)
                ->delete();


            \Session::flash('mensaje', 'Usuario eliminado con exito');


            return redirect()->route('ListaUsuarios');

    }
   public function UpdateUsuario($id){
    $InfoCategoria = Categoria::all();
    $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
    $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

    $nuevoNombre = $_GET['nombre'];
    $nuevoCorreo = $_GET['email'];

    DB::table('users')->where("id", "=", $id)->update(['name' => $nuevoNombre,'email'=>$nuevoCorreo]);
    return redirect()->route('home')->with('mensaje', 'Usuario Modificado con exito');

    }
    public function RecuperarPass(Request $request){
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        return view('RecuperarContra',compact('request','InfoCategoria','InfoPlataformaJ','InfoPlataformaS'));
   }

   public function EnviarDatos(){
     $data = $this->validate(request(),[
        'email' => 'email'|'required|string',
        'pass' =>  'required|string',
        'passconfirm' => 'required|string'
    ]);
    if($data['pass']==$data['passconfirm']){
        $updateUser = User::update([
            'email' => $data['email'],
            'password' => Hash::make($data['pass']),
        ]);
        return redirect()->route('login',compact('updateUser','data'))->with('mensaje','Usuario Actualizado exitosamente');
    }else{
        return redirect()->route('login')->with('mensaje','Error al actualizar datos, verifique sus datos.');
    }
   }
   public function CambiarPass(Request $request,$id){

   }

}
