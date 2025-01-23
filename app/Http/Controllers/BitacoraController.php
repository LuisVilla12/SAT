<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;
use App\Models\Servicios;


class BitacoraController extends Controller
{
    //
    public function index(){
        $registros = Bitacoras::with('servicios')->orderBy('fecha_visita', 'desc')->paginate(10);
        return view('bitacora.index',['registros'=>$registros]);
    }
    public function create(){
        $estudiantes=Servicios::all();
        return view('bitacora.create',['estudiantes'=>$estudiantes]);
    }
    public function store(Request $request){
        $request->validate([
            'servicios_id'=>' required',
            'fecha_visita'=>' required',
            'hora_entrada'=>' required',
        ]);
        Bitacoras::create([
            'servicios_id'=>$request->servicios_id,
            'fecha_visita'=>$request->fecha_visita,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>'00:00',
            'state'=>1
        ]);
        // return response()->json(['success' => true, 'message' => 'Proveedor registrado exitosamente.']);
        return redirect()->route('bitacora.index');
    }
    public function edit(Bitacoras $registro){
        $estudiante = Servicios::where('id', $registro->servicios_id)->get();
        return view('bitacora.edit',['registro'=>$registro,'estudiantes'=>$estudiante]);
    }

    public function update(Bitacoras $registro,Request $request){
        $request->validate([
            'servicios_id'=>' required',
            'fecha_visita'=>' required',
            'hora_entrada'=>' required',
            'hora_salida'=>' required',
        ]);

        $registro->update([
            'servicios_id'=>$request->servicios_id,
            'fecha_visita'=>$request->fecha_visita,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>$request->hora_salida
        ]);
        return redirect()->route('bitacora.index');
    }
    public function show(Bitacoras $registro){
        $estudiante = Servicios::where('id', $registro->servicios_id)->get();
        return view('bitacora.show',['registro'=>$registro,'estudiantes'=>$estudiante]);
    }
}
