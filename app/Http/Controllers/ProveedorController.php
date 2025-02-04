<?php

namespace App\Http\Controllers;

use App\Models\Proveedors;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //
    public function index(){
        $proveedores=Proveedors::all();
        return view('proveedor.index',['proveedores'=>$proveedores]);
    }

    public function create(){
        return view('proveedor.create');
    }
    public function store(Request $request){
        $request->validate([
            'name_persona'=>' required | min:3',
            'name_company'=>' required | min:3',
            'type'=>' required'
        ]);
        Proveedors::create([
            'name_persona'=>$request->name_persona,
            'name_company'=>$request->name_company,
            'type'=>$request->type,
            'state'=>1
        ]);
        // return response()->json(['success' => true, 'message' => 'Proveedor registrado exitosamente.']);
        return redirect()->route('proveedor.index');
    }
    
    public function edit(Proveedors $proveedor){
        return view('proveedor.edit',['proveedor'=>$proveedor]);
    }
    public function update(Proveedors $proveedor,Request $request){
        $request->validate([
            'name_persona'=>' required | min:3',
            'name_company'=>' required | min:3',
            'type'=>' required',
        ]);
        $proveedor->update([
            'name_persona'=>$request->name_persona,
            'name_company'=>$request->name_company,
            'type'=>$request->type,
            'state'=>$request->state
        ]);
        return redirect()->route('proveedor.index');
    }

    public function destroy($id){
    $proveedor = Proveedors::findOrFail($id);
    $proveedor->delete();

    return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
