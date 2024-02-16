function validarLongitudFormulario() {
    var nombre = document.getElementById('nombre').value;
    var domicilio = document.getElementById('descripcion').value;
    var telefono = document.getElementById('precio').value;
    var banco = document.getElementById('cantidad').value;

    if (nombre.length > 30) {
        alert("Error: El campo 'Nombre' no puede exceder los 30 caracteres.");
        return false;
    }

    if (descripcion.length > 50) {
        alert("Error: El campo 'Descripción' no puede exceder los 50 caracteres.");
        return false;
    }

    if (precio.length > 10) {
        alert("Error: El campo 'Precio' no puede exceder los 10 caracteres.");
        return false;
    }

    if (cantidad.length > 5) { 
        alert("Error: El campo 'Cantidad' no puede exceder los 5 caracteres.");
        return false;
    }

    return true;
}