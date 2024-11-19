<?php

namespace App\Http\Controllers;

use App\Models\Proveedors;
use App\Models\Visitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;



class VisitasController extends Controller
{
    //
    public function index(){
    $visitas = Visitas::with('proveedors')->orderBy('id', 'asc')->get();
    //     $visitas = DB::table('visitas')->join('proveedors', 'proveedors.id', '=', 'visitas.proveedors_id')->select(
    //     'visitas.id',
    //     'visitas.name_persona',
    //     'proveedors.name_company as proveedor_nombre',
    //     'visitas.area',
    //     'visitas.fecha_visita',
    //     'visitas.hora_entrada',
    //     'visitas.hora_salida'
    // )->orderBy('visitas.id', 'desc')->get()->toArray();
    // dd($visitas);
        return view('visitas.index',['visitas'=>$visitas]);
    }

    public function create(){
        $proveedores=Proveedors::all();
        return view('visitas.create',['proveedores'=>$proveedores]);
    }

    public function store(Request $request){
        // dd( $request);
        $request->validate([
            'name_persona'=>' required | min:3',
            'proveedors_id'=>' required',
            'area'=>' required | min:3',
            'motivo_visita'=>' required | min:3',
            'fecha_visita'=>'required',
            'hora_entrada'=>' required | min:3',
        ]);
        Visitas::create([
            'name_persona'=>$request->name_persona,
            'proveedors_id'=>$request->proveedors_id,
            'area'=>$request->area,
            'motivo_visita'=>$request->motivo_visita,
            'fecha_visita'=>$request->fecha_visita,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>'00:00',
            'comentarios'=>'Sin comentarios',
            'state'=>1//1 sin finalizar 0 finalizada
        ]);
        return response()->json(['success' => true, 'message' => 'Visita registrado exitosamente.']);

        // return redirect()->route('visitas.index');
    }

    public function edit(Visitas $visita){
        $proveedores=Proveedors::all();
        return view('visitas.edit',['visita'=>$visita,'proveedores'=>$proveedores]);
    }

    public function update(Visitas $visita, Request $request){
        // dd($request);
        $request->validate([
            'name_persona'=>' required | min:3',
            'proveedors_id'=>' required',
            'area'=>' required | min:3',
            'motivo_visita'=>' required | min:3',
            'fecha_visita'=>'required',
            'hora_entrada'=>' required',
            'hora_salida'=>' required',
        ]);
        $visita->update([
            'name_persona'=>$request->name_persona,
            'proveedors_id'=>$request->proveedors_id,
            'area'=>$request->area,
            'motivo_visita'=>$request->motivo_visita,
            'fecha_visita'=>$request->fecha_visita,
            'hora_entrada'=>$request->hora_entrada,
            'hora_salida'=>$request->hora_salida,
            'comentarios'=>$request->comentarios,
            'state'=>1//1 sin finalizar 0 finalizada
        ]);
        return redirect()->route('visitas.index');
    }
    public function show(Visitas $visita){
        $proveedores=Proveedors::all();
        return view('visitas.show',['visita'=>$visita,'proveedores'=>$proveedores]);
    }

    public function generarPase($id)
    {
        // Obtener el registro de la visita por su ID
        $visita = Visitas::findOrFail($id);

        // Generar el PDF utilizando la vista creada
        $pdf = PDF::loadView('visitas.pase');

        // Devolver el PDF generado como respuesta para descargar
        return $pdf->download('pase_visita_'.$visita->id.'.pdf');
    }
}

