<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'tipo' => 'required|in:cliente,administrador',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'tipo' => $request->input('tipo'),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:8',
                'tipo' => 'required',
            ]);

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->input('name'),
                'apellidos' => $request->input('apellidos'),
                'email' => $request->input('email'),
                'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
                'tipo' => $request->input('tipo'),
            ]);

            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
        }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function show($id)
        {
            $user = User::findOrFail($id);
            return view('users.index', compact('user'));
        }
}
