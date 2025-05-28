<?php
include 'seguridad.php';
require "conn.php"; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $sexo = $_POST['sexo'];

    $rutaServidor = 'fotos_empleados';

    $nombrefoto = $_FILES['foto_emp']['name'];
    $rutaTemporal = $_FILES['foto_emp']['tmp_name'];
    $pesofoto = $_FILES['foto_emp']['size'];
    $tipofoto = $_FILES['foto_emp']['type'];

    date_default_timezone_set('UTC');
    $nombreimagenunico = date("Y-m-d-H-m-s") . "-" . $nombrefoto;

    $rutaDestino = $rutaServidor . "/" . $nombreimagenunico;

    if ($pesofoto > 999999) {
        echo '
        <script>
        alert("Es demasiado pesada la foto");
        window.history.go(-1);
        </script>
        ';
    exit;
    }

    // Validar solo tipo de imagen (como pediste)
    if ($tipofoto == "image/jpeg" or $tipofoto == "image/png" or $tipofoto == "image/gif") {
        // Mover el archivo a la carpeta
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            echo '
            ';
        }
    } else {

        exit();
        echo '
        <script>
        alert("No es una foto");
        window.history.go(-1);
        </script>
        ';
        exit;
    }


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
    $query = "INSERT INTO empleados (Nombre_empleado, Apellido_empleado, FechaNacimiento, Sexo, ruta_foto) 
              VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$sexo', '$rutaDestino')";

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
