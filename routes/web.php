<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisitasController;
use App\Models\User;
use App\Models\Visitas;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/', [LoginController::class,'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/administracion', [AdminController::class,'index'])->name('admin.index')->middleware('auth');


// Usuarios
Route::get('/registro-usuario',[ RegisterController::class,'create'])->name('auth.create')->middleware('auth','check.usertype');
Route::post('/registro-usuario',[ RegisterController::class,'store']);
Route::get('/usuarios',[ RegisterController::class,'index'])->name('auth.index')->middleware('auth','check.usertype');
Route::get('/editar-usuario/{usuario}/edit',[ RegisterController::class,'edit'])->name('auth.edit')->middleware('auth');
Route::post('/editar-usuario/{user}/edit',[ RegisterController::class,'update']);
Route::get('/mostrar-usuario/{user}',[ RegisterController::class,'show'])->name('auth.show')->middleware('auth','check.usertype');
Route::get('/cambiar-password/{user}',[ RegisterController::class,'gedit_password'])->name('auth.edit_password')->middleware('auth','check.usertype');
Route::post('/cambiar-password/{user}',[ RegisterController::class,'pedit_password']);


// Proveedores
Route::get('/registro-proveedor', [ProveedorController::class,'create'])->name('proveedor.create')->middleware('auth');
Route::post('/registro-proveedor', [ProveedorController::class,'store']);
Route::get('/consultar-proveedor', [ProveedorController::class,'index'])->name('proveedor.index')->middleware('auth');
Route::get('/editar-proveedor/{proveedor}/edit',[ ProveedorController::class,'edit'])->name('proveedor.edit')->middleware('auth');
Route::post('/editar-proveedor/{proveedor}/edit',[ ProveedorController::class,'update']);

//Visitas
Route::get('/registro-visitas', [VisitasController::class,'create'])->name('visitas.create')->middleware('auth');
Route::post('/registro-visitas', [VisitasController::class,'store']);
Route::get('/visitas', [VisitasController::class,'index'])->name('visitas.index')->middleware('auth');
Route::get('/registar-salida/{visita}/edit',[ VisitasController::class,'edit'])->name('visitas.edit')->middleware('auth');
Route::post('/registar-salida/{visita}/edit',[ VisitasController::class,'update']);
Route::get('/mostrar-salida/{visita}',[ VisitasController::class,'show'])->name('visitas.show')->middleware('auth');
//Pase
use App\Http\Controllers\VisitaController;

Route::get('/visita/{id}/generar-pase', [VisitasController::class, 'generarPase'])->name('visitas.generarPase')->middleware('auth');


