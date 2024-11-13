<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //
    public function create(){
        return view('proveedor.create');
    }
    public function index(){
        return view('proveedor.index');
    }
}
