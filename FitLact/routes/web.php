<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ProductoController;

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

    
//PRODUCTOS
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');