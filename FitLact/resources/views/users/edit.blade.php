@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ $user->name }}" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="{{ $user->apellidos }}" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password"><br>

        <!-- <label for="tipo">Tipo:</label>
        <input type="tipo" name="tipo"><br> -->

        <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="cliente">Cliente</option>
                <option value="administrador">Administrador</option>
            </select>

        <button type="submit">Actualizar</button>
    </form>
@endsection
