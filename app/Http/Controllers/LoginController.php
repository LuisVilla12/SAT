<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    // public function
    public function store(Request $request){
        // dd('autenticando');
        $request->validate([
            'username'=>['required'],
            'password'=>['required']
        ]);
        $credentials = $request->only('username', 'password');
        // Si quiere que lo recuerde
        // dd($request->remember);
         // Intentar autenticar al usuario
        if (auth()->attempt($credentials)) {
        // Inicio de sesión exitoso
            return redirect()->route('visitas.create')->with('mensaje', 'Inicio de sesión exitoso');
        }
        return back()->withErrors([
            'mensaje' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
    public function logout(){
        return view('auth.login');
    }
    
}
