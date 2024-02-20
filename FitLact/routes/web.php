<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

Route::get('/', [ViewsController::class, 'index_inicio'])
    -> name('inicio.index');

Route::get('/acerca', [ViewsController::class, 'index_acerca'])
    -> name('acerca.index');

Route::get('/contacto', [ViewsController::class, 'index_contacto'])
    -> name('contacto.index');

Route::get('/servicios', [ViewsController::class, 'index_servicios'])
    -> name('servicios.index');

Route::get('/ayuda', [ViewsController::class, 'index_ayuda'])
    -> name('ayuda.index');

Route::get('/empezar', [ViewsController::class, 'index_empezar'])
    -> name('empezar.index');

    Route::get('/empezar/alimentacion', [ViewsController::class, 'index_alimentacion'])
    -> name('alimentacion.index');

// Servicios
Route::get('/nutricion', [ViewsController::class, 'nutricion'])
    -> name('nutricion.index');
// Route::get('/productos', [ViewsController::class, 'productos'])
//     -> name('productos.index');
Route::get('/salud', [ViewsController::class, 'salud'])
    -> name('salud.index');

/* ADMINISTRADOR */

// DASHBOARD
Route::get('/administrador', [ViewsController::class, 'index_inicio_admin'])
    -> name('inicio_admin.index');
    
// CRUD PRODUCTOS
Route::get('administrador/alimentos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('administrador/alimentos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('administrador/alimentos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('administrador/alimentos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('administrador/alimentos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('administrador/alimentos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// CRUD USUARIOS
Route::resource('users', UserController::class);
