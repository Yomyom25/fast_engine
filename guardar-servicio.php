<?php
include 'seguridad.php';
require "conn.php"; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_servicio = $_POST['nombre_servicio'];
    $descripcion = $_POST['descripcion'];

    // Validar campos requeridos
    if (empty($nombre_servicio) || empty($descripcion)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
        exit;
    }

    // Prevenir inyección SQL
    $nombre_servicio = mysqli_real_escape_string($conectar, $nombre_servicio);
    $descripcion = mysqli_real_escape_string($conectar, $descripcion);

    // Insertar el servicio en la base de datos
    $query = "INSERT INTO servicios (Nombre_servicio, Descripcion) 
              VALUES ('$nombre_servicio', '$descripcion')";

    if (mysqli_query($conectar, $query)) {
        // Mostrar alerta de éxito y redirigir
        echo "<script>
                alert('Servicio guardado exitosamente.');
                window.location.href = 'servicios.php';
              </script>";
    } else {
        // Mostrar error en caso de fallo
        echo "<script>
                alert('Error al guardar el servicio: " . mysqli_error($conectar) . "');
                window.history.back();
              </script>";
    }

    // Cerrar la conexión
    mysqli_close($conectar);
} else {
    echo "<script>
            alert('Acceso no autorizado.');
            window.location.href = 'servicios.php';
          </script>";
}
?>
