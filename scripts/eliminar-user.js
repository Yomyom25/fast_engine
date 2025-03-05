
// Funcion para validar el formulario de crear usuario
function validarDelete(url) {
    var mensaje = confirm("¿Está seguro de eliminar este usuario?");
    if (mensaje == true) {
        window.location = url;
    }
}
