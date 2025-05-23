<?php
include 'seguridad.php';
require "conn.php"; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];

    // Validar campos requeridos
    if (empty($nombre) || empty($apellido) || empty($fecha_nacimiento) || empty($sexo)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
        exit;
    }

    // Prevenir inyección SQL
    $nombre = mysqli_real_escape_string($conectar, $nombre);
    $apellido = mysqli_real_escape_string($conectar, $apellido);
    $fecha_nacimiento = mysqli_real_escape_string($conectar, $fecha_nacimiento);
    $sexo = mysqli_real_escape_string($conectar, $sexo);

    // Insertar el empleado en la base de datos
    $query = "INSERT INTO empleados (Nombre_empleado, Apellido_empleado, FechaNacimiento, Sexo) 
              VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$sexo')";

    if (mysqli_query($conectar, $query)) {
        // Mostrar alerta de éxito y redirigir
        echo "<script>
                alert('Empleado guardado exitosamente.');
                window.location.href = 'empleados.php';
              </script>";
    } else {
        // Mostrar error en caso de fallo
        echo "<script>
                alert('Error al guardar el empleado: " . mysqli_error($conectar) . "');
                window.history.back();
              </script>";
    }

    // Cerrar la conexión
    mysqli_close($conectar);
} else {
    echo "<script>
            alert('Acceso no autorizado.');
            window.location.href = 'empleados.php';
          </script>";
}
?>
