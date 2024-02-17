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
        $campos=[
            'nombre' => 'required|string|string|max:30',
            'descripcion' => 'string|max:50|nullable',
            'precio' => 'required',
            'cantidad' => 'required|string|max:5',
        ];
        $mensaje=[
            'required'=>':attribute requerido',
        ];
        
        $datos = $this->validate($request, $campos, $mensaje);

        Producto::create($datos);
        return redirect()->route('productos.index')->with('success', 'Archivo agregado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $campos=[
            'nombre' => 'required|string|string|max:30',
            'descripcion' => 'string|max:50|nullable',
            'precio' => 'required',
            'cantidad' => 'required|string|max:5',
        ];
        $mensaje=[
            'required'=>':attribute requerido',
        ];
        
        $datos = $this->validate($request, $campos, $mensaje);
        $producto->update($datos);
        return redirect()->route('productos.index')->with('success', 'Archivo actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('alert', 'Archivo eliminado exitosamente.');
    }
}