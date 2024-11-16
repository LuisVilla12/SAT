<?php

namespace App\Http\Controllers;

use App\Models\Proveedors;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    //
    public function create(){
        $proveedores=Proveedors::all();
        return view('visitas.create',['proveedores'=>$proveedores]);
    }
}
