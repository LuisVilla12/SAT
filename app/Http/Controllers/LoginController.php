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
        $this->validate($request,[
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        // Si quiere que lo recuerde
        // dd($request->remember);

        // Autenticar credenciales y coloca si quiere que se recuerde
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Credenciales incorrectas');
        }
        else{
            // return redirect()->route('posts.index',['user'=>auth()->user()->username]);
            return redirect()->route('index');
        }
    }
}
