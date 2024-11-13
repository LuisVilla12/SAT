<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class,'index'])->name('login');
Route::get('/crear-usuario',[ RegisterController::class,'create'])->name('register.create');
Route::post('/crear-usuario',[ RegisterController::class,'store']);
Route::get('/administracion', [AdminController::class,'index'])->name('admin.index');
