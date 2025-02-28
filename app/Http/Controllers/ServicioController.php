<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //
    public function index(){
        $estudiantes=Servicios::all();
        return view('servicio.index',['estudiantes'=>$estudiantes]);
    }
    public function create(){
        return view('servicio.create');
    }
    public function store(Request $request){
        $request->validate([
            'matricula'=>' required',
            'name'=>' required','min:2','max:20',
            'lastname_p'=>' required','min:2','max:20',
            'lastname_m'=>' required','min:2','max:20',
            'company'=>' required','min:1','max:20',
            'mesInicio'=>' required',
        ]);
        Servicios::create([
            'matricula'=>$request->matricula,
            'name'=>$request->name,
            'lastname_p'=>$request->lastname_p,
            'lastname_m'=>$request->lastname_m,
            'company'=>$request->company,
            'mesInicio'=>$request->mesInicio,
            'state'=>1
        ]);
        // dd($request);
        // return response()->json(['success' => true, 'message' => 'Proveedor registrado exitosamente.']);
        return redirect()->route('estudiante.index');
    }
    public function edit(Servicios $estudiante){
        return view('servicio.edit',['estudiante'=>$estudiante]);
    }
    public function update(Servicios $estudiante,Request $request){
        $request->validate([
            'matricula'=>' required',
            'name'=>' required','min:2','max:20',
            'lastname_p'=>' required','min:2','max:20',
            'lastname_m'=>' required','min:2','max:20',
            'company'=>' required','min:1','max:20',
            'mesInicio'=>'required',
            'state'=>' required',
        ]);
        $estudiante->update([
            'matricula'=>$request->matricula,
            'name'=>$request->name,
            'lastname_p'=>$request->lastname_p,
            'lastname_m'=>$request->lastname_m,
            'company'=>$request->company,
            'state'=>$request->state,
            'mesInicio'=>$request->mesInicio,
        ]);
        return redirect()->route('estudiante.index');
    }
    public function destroy($id){
        $estudiante = Servicios::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiante.index');;
    }
}


