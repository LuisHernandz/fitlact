@extends('layouts.app')

@section('content')
    <h1>Crear Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <!-- <label for="tipo">Tipo:</label>
        <input type="tipo" name="tipo" required><br> -->

        <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="cliente">Cliente</option>
                <option value="administrador">Administrador</option>
            </select>

        <button type="submit">Guardar</button>
    </form>
@endsection
