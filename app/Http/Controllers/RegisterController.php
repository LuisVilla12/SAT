<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    //

    public function index(){
        $usuarios=User::all();
        return view('auth.index',['usuarios'=>$usuarios]);
    }
    public function create(){
        return view('auth.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:20',
            'lastnameP'=>['required','min:3','max:20'],
            'lastnameM'=>['required','min:3','max:20'],
            'email'=>['required','min:10','unique:users'],
            'username'=>['required','unique:users'],
            'company'=>['required','min:3'],
            'type'=>['required'],
            // 'puesto'=>['required'],
            'password'=>['required','min:9','confirmed']
        ]);

        // dd('creando usuario');
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'company'=>$request->company,
            'lastnameP'=>$request->lastnameP,
            'lastnameM'=>$request->lastnameM,
            'email'=>$request->email,
            'type'=>$request->type,
            'puesto'=>'DUDA',
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('auth.index');
    }

    public function edit(User $usuario){
        return view('auth.edit',['usuario'=>$usuario]);
    }

    public function update(User $usuario, Request $request){
        // dd($request);
        $request->validate([
            'name'=>'required|min:3|max:20',
            'username'=>['required'],
            'lastnameP'=>['required','min:3','max:20'],
            'lastnameM'=>['required','min:3','max:20'],
            'email'=>['required','min:10'],
            'company'=>['required','min:3'],
            'type'=>['required'],
        ]);
        $usuarioA= User::find($request->id); // Verifica que realmente obtienes un usuario.
        $usuarioA->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'company'=>$request->company,
            'lastnameP'=>$request->lastnameP,
            'lastnameM'=>$request->lastnameM,
            'email'=>$request->email,
            'type'=>$request->type,
            'puesto'=>'DUDA',
        ]);
        // dd($usuario);
        return redirect()->route('auth.index');
    }
    public function show($id){
        $usuarioA= User::find($id); // Verifica que realmente obtienes un usuario.
        return view('auth.show',['usuario'=>$usuarioA]);
    }
    public function gedit_password($id){
        $usuarioA= User::find($id); // Verifica que realmente obtienes un usuario.
        return view('auth.gpassword',['usuario'=>$usuarioA]);
    }

    public function pedit_password(Request $request){
        $usuarioA= User::find($request->id); // Verifica que realmente obtienes un usuario.
        $request->validate([
            'password'=>['required','min:9','confirmed']
        ]);
        // dd($usuarioA);
        $usuarioA->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('auth.index');
    }
}
