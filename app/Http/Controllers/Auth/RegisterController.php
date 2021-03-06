<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Juego;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $consulta = Juego::all()->sortByDesc('id_juego')->take(10);
        $validacion= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validacion){
           return view('login',compact('consulta'));
        }else{
          return "Error en la validacion de usuario!";
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create()
    {
        $data = $this->validate(request(),[
            'nombre' => 'required|string',
            'correo' => 'email|required|string',
            'contraseña' => 'required|string'
        ]);
        $newUser= User::create([
            'name' => $data['nombre'],
            'email' => $data['correo'],
            'password' => Hash::make($data['contraseña']),
        ]);
        return redirect()->route('login',compact('newUser','data'))->with('mensaje','Usuario Creado exitosamente');
    }
}




