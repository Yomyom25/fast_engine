<?php
include 'seguridad.php';
require "conn.php"; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // Validar campos requeridos
    if (empty($nombre) || empty($empresa) || empty($telefono) || empty($correo)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
        exit;
    }

    // Prevenir inyección SQL
    $nombre = mysqli_real_escape_string($conectar, $nombre);
    $empresa = mysqli_real_escape_string($conectar, $empresa);
    $telefono = mysqli_real_escape_string($conectar, $telefono);
    $correo = mysqli_real_escape_string($conectar, $correo);

    // Insertar el cliente en la base de datos
    $query = "INSERT INTO clientes (Nombre_cliente, Empresa, Telefono, Correo) 
              VALUES ('$nombre', '$empresa', '$telefono', '$correo')";

    if (mysqli_query($conectar, $query)) {
        // Mostrar alerta de éxito y redirigir
        echo "<script>
                alert('Cliente guardado exitosamente.');
                window.location.href = 'clientes.php';
              </script>";
    } else {
        // Mostrar error en caso de fallo
        echo "<script>
                alert('Error al guardar el cliente: " . mysqli_error($conectar) . "');
                window.history.back();
              </script>";
    }

    // Cerrar la conexión
    mysqli_close($conectar);
} else {
    echo "<script>
            alert('Acceso no autorizado.');
            window.location.href = 'clientes.php';
          </script>";
}
?>
