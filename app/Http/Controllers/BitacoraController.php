<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;
use App\Models\Servicios;
use Illuminate\Support\Facades\DB;



class BitacoraController extends Controller
{
    //
    public function index(){
        $registros = Bitacoras::with('servicios')->orderBy('fecha_visita', 'desc')->paginate(10);
        // $estudiantes =Servicios::all() ;
        $estudiantes = Servicios::select(
            'servicios.matricula',
            'servicios.name',
            'servicios.lastname_p',
            'servicios.lastname_m',
            'servicios.company',
            DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(bitacoras.hora_salida, bitacoras.hora_entrada)))) AS tiempo_estadia')
        )
        ->join('bitacoras', 'bitacoras.servicios_id', '=', 'servicios.id')
        ->groupBy('servicios.id', 'servicios.matricula', 'servicios.name', 'servicios.lastname_p', 'servicios.lastname_m', 'servicios.company')
        ->get() ;
        return view('bitacora.index',['registros'=>$registros, 'estudiantes'=>$estudiantes]);
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
            'hora_salida'=>$request->hora_entrada,
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
