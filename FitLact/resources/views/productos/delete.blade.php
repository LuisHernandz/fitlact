<form method="POST" action="{{ route('productos.destroy', $producto) }}">
    @csrf
    @method('DELETE')

    <p>¿Estás seguro de que deseas eliminar el producto "{{ $producto->nombre }}"?</p>

    <button type="submit">Eliminar Producto</button>
</form>