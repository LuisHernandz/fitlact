<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.show', compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Archivo agregado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Archivo actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Archivo eliminado exitosamente.');
    }
}