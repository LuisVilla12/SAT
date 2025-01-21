<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;
use App\Models\Servicios;


class BitacoraController extends Controller
{
    //
    public function index(){
        // $visitas = Visitas::with('proveedors')->orderBy('fecha_visita', 'desc')->paginate(6);
        $registros = Bitacoras::with('servicios')->orderBy('fecha_visita', 'desc')->paginate(10);
        // $registros = Bitacoras::all();
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
            'state'=>1
        ]);
        // return response()->json(['success' => true, 'message' => 'Proveedor registrado exitosamente.']);
        return redirect()->route('bitacora.index');
    }
    public function edit(Bitacoras $bitacora){
        return view('bitacora.edit',['bitacora'=>$bitacora]);
    }
    public function update(Bitacoras $bitacora,Request $request){
        $request->validate([
            'servicios_id'=>' required',
            'fecha_visita'=>' required',
            'hora_entrada'=>' required',
            'hora_salida'=>' required',
        ]);
        $bitacora->update([
            'servicios_id'=>$request->servicios_id,
            'fecha_visita'=>$request->fecha_visita,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>$request->required
        ]);
        return redirect()->route('bitacora.index');
    }
}
