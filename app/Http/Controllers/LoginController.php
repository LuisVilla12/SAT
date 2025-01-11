<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $credentials = $request->only('username', 'password');
        $credentials = ['username' => $request->username, 'password' => $request->password];
        // Si quiere que lo recuerde
        // dd($request->remember);

         // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
        // Inicio de sesión exitoso
            return redirect()->route('visitas.create')->with('mensaje', 'Inicio de sesión exitoso');
        }
        return back()->withErrors([
            'mensaje' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
    
}
