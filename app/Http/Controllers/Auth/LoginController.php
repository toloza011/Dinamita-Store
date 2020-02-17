<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;

class LoginController extends Controller
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        /* $this->middleware('guest', ['only' => 'showLoginForm']); */
    }   

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
            
        $credentials = $request->only('email','password');           
        if(Auth::attempt($credentials, $request->has('remember')))
        {
            
          
           /*  return $request->session()->all(); */
             return redirect()->route('home'); 
        }
        return back()   ->withErrors(['email'=>'Estas credenciales no coinciden con nuestros registros'])
                        ->withInput(request(['email']));
        
        /* $request->session()->flush() ; */
        /* $request->session()->get('key'); 
            return $request->session()->all();*/      
    }
    
    
    public function logout(Request $request){
       
        $request->session()->flush();

        return redirect()->route('home');

    }

}
