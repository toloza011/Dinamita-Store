<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Categoria;
use App\Plataforma;
use App\Juego;
use Redirect;
use DB;
use DataTables;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




class UserController extends Controller
{
    public function getUserAll()
    {
        $Users =  User::select("id", "name", "email")->where('id', '<>', 4);

        return DataTables::of($Users)->addColumn('action2', function ($id) {
            $token =  csrf_field();
            return ' <form action="QuitarUsuario" method="post" id="FormularioEliminarUsuario" class="delete">  ' . $token . ' <input type="hidden" name="id" id="id" value=' .  $id->id  . '>
            <td><button type="submit" value="Eliminar" id="boton1" class="btn btn-danger" onclick="return confirm(`¿Está seguro que desea eliminar a ' .  $id->name  . '?`);" /><i class="fa fa-trash"></i></td>
            </form>';
        })->rawColumns(['action2' => 'action2'])->make(true);
    }


    public function edit(Request $request, $id)
    {
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $usuario = DB::table('users')->select("*")->where('id', '=', $id)->first();

        return view('users.editar', compact('usuario', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS', 'request'));
    }

    public function update($id)
    {

        $nuevoNombre = $_GET['nombre'];
        $nuevoCorreo = $_GET['email'];

        DB::table('users')->where("id", "=", $id)->update(['name' => $nuevoNombre, 'email' => $nuevoCorreo]);
        return redirect()->route('ListaUsuarios')->with('mensaje', 'Usuario Modificado con exito');
    }

    public function QuitarPlataforma(Request $request)
    {

        $id = $_POST['id'];
        $id2 = DB::table('clientes')->select('id_cliente')->where('id', '=', $id)->get();
        DB::table('users')->where('id', '=', $id)->delete();
        DB::table('carritos')->where('id', '=', $id)->delete();
        $tot = 0;
        foreach ($id2 as $item)
            $tot++;

        if ($tot != 0) {
            DB::table('ventas')->where('id_cliente', '=', $id2)->delete();
            DB::table('clientes')->where('id', '=', $id)->delete();
        }


        \Session::flash('mensaje', 'Usuario eliminado con exito');


        return redirect()->route('ListaUsuarios');
    }
    public function UpdateUsuario($id)
    {
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();

        $nuevoNombre = $_GET['nombre'];
        $nuevoCorreo = $_GET['email'];

        DB::table('users')->where("id", "=", $id)->update(['name' => $nuevoNombre, 'email' => $nuevoCorreo]);
        return redirect()->route('home')->with('mensaje', 'Usuario Modificado con exito');
    }
    public function RecuperarPass(Request $request)
    {
        $InfoCategoria = Categoria::all();
        $InfoPlataformaJ = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('juegos', 'plataformas.id_plataforma', '=', 'juegos.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        $InfoPlataformaS = Plataforma::select('plataformas.id_plataforma', 'plataformas.nombre_plataforma')->join('subscripciones', 'plataformas.id_plataforma', '=', 'subscripciones.id_plataforma')->groupBy('id_plataforma', 'nombre_plataforma')->get();
        return view('RecuperarContra', compact('request', 'InfoCategoria', 'InfoPlataformaJ', 'InfoPlataformaS'));
    }

    public function EnviarDatos()
    {
        $correo = $_GET['email'];
        $verificarCorreo = DB::table('users')->select('email')->where('email','=',$correo)->get();
        //dd( $verificarCorreo);
        $cont=0;
        foreach($verificarCorreo as $item){
            $cont+=1;
        }
        if($cont != 0){
            require_once '../vendor/autoload.php';
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = "DinamiteStore2020@gmail.com";   //username
            $mail->Password = "dinamitestore++";   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port
            $mail->smtpConnect([
                'ssl' => [
                     'verify_peer' => false,
                     'verify_peer_name' => false,
                     'allow_self_signed' => true
                 ]
             ]);

            $mail->setFrom('DinamiteStore2020@gmail.com', 'Dinamite Store');
            $mail->addAddress($correo, 'RECEPIENT_NAME');

       

            $mail->isHTML(true);
            $mail->Subject = 'Prueba enviar correos desde pagina web';
            $mail->Body    = '<b>si te llega este correo porfavor avisame por wsp gracias PD: el manu <3 <3</b>';

            $mail->send();
            \Session::flash('mensaje', 'Hemos enviado un correo de confirmacion');
            return Redirect::back();

        }else{
            \Session::flash('mensaje2', 'No existe registro de este correo');
            return Redirect::back();
        }
        
 
    }


    
    public function CambiarPass(Request $request, $id)
    {
    }
}
