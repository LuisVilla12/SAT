<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    //
    public function create(){
        return view('auth.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:20',
            'lastnameP'=>['required','min:5','max:20'],
            'lastnameM'=>['required','min:5','max:20'],
            'email'=>['required','min:10','unique:users'],
            'password'=>['required','min:9','confirmed']
        ]);

        // dd('creando usuario');
        User::create([
            'name'=>$request->name,
            'lastnameP'=>$request->lastnameP,
            'lastnameM'=>$request->lastnameM,
            'email'=>$request->email,
            'type'=>$request->type,
            'password'=>Hash::make($request->password)
        ]);
         // Otra forma de autenticar
        // if (auth()->attempt($request->only('email', 'password'))) {
        //     // Autenticación exitosa
        //     return redirect()->route('index');
        // }
         // Redireccionar
    }
}
