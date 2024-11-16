<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisitasController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class,'index'])->name('login');
Route::get('/administracion', [AdminController::class,'index'])->name('admin.index');

// Usuarios
Route::get('/registro-usuario',[ RegisterController::class,'create'])->name('register.create');
Route::post('/registro-usuario',[ RegisterController::class,'store']);

// Proveedores
Route::get('/registro-proveedor', [ProveedorController::class,'create'])->name('proveedor.create');
Route::post('/registro-proveedor', [ProveedorController::class,'store']);
Route::get('/consultar-proveedor', [ProveedorController::class,'index'])->name('proveedor.index');
Route::get('/editar-proveedor/{proveedor}/edit',[ ProveedorController::class,'edit'])->name('proveedor.edit');
Route::post('/editar-proveedor/{proveedor}/edit',[ ProveedorController::class,'update']);

//Visitas
Route::get('/registro-visitas', [VisitasController::class,'create'])->name('visitas.create');
Route::post('/registro-visitas', [VisitasController::class,'store']);


// historal-visitas
