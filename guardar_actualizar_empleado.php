<?php
include 'seguridad.php';
require 'conn.php';

$id_empleado = $_POST['id_empleado'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];

// Obtener la ruta de la foto actual
$consulta_foto_actual = "SELECT ruta_foto FROM empleados WHERE ID_empleado = '$id_empleado'";
$resultado_foto_actual = mysqli_query($conectar, $consulta_foto_actual);
$fila_foto_actual = $resultado_foto_actual->fetch_array();
$ruta_foto_actual = $fila_foto_actual["ruta_foto"];

// Procesar la foto (si se subió una nueva)
if (isset($_FILES["foto_emp"]) && $_FILES["foto_emp"]["error"] == 0) {
    $rutaServidor = 'fotos_empleados';
    $nombrefoto = $_FILES['foto_emp']['name'];
    $rutaTemporal = $_FILES['foto_emp']['tmp_name'];
    $pesofoto = $_FILES['foto_emp']['size'];
    $tipofoto = $_FILES['foto_emp']['type'];

    // Validar el tamaño de la foto
    if ($pesofoto > 999999) {
        echo '
        <script>
        alert("La foto es demasiado pesada (máximo 1MB)");
        window.history.go(-1);
        </script>
        ';
        exit;
    }

    // Validar el tipo de foto
    if ($tipofoto == "image/jpeg" || $tipofoto == "image/png" || $tipofoto == "image/gif") {
        // Generar un nombre único para la foto
        date_default_timezone_set('UTC');
        $nombreimagenunico = date("Y-m-d-H-i-s") . "-" . $nombrefoto;
        $rutaDestino = $rutaServidor . "/" . $nombreimagenunico;

        // Mover la foto al servidor
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            // Eliminar la foto anterior si existe
            if (!empty($ruta_foto_actual) && file_exists($ruta_foto_actual)) {
                unlink($ruta_foto_actual);
            }
            $ruta_foto = $rutaDestino; // Usar la nueva foto
        } else {
            echo '
            <script>
            alert("Error al subir la foto");
            window.history.go(-1);
            </script>
            ';
            exit;
        }
    } else {
        echo '
        <script>
        alert("El archivo no es una imagen válida (solo JPG, PNG o GIF)");
        window.history.go(-1);
        </script>
        ';
        exit;
    }
} else {
    // Mantener la foto actual si no se subió una nueva
    $ruta_foto = $ruta_foto_actual;
}

// Actualizar el empleado en la base de datos
$actualizar = "UPDATE empleados SET 
               Nombre_empleado = '$nombre', 
               Apellido_empleado = '$apellido', 
               FechaNacimiento = '$fecha_nacimiento', 
               Sexo = '$sexo', 
               ruta_foto = '$ruta_foto' 
               WHERE ID_empleado = '$id_empleado'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
    <script>
    alert("Empleado actualizado correctamente!");
    location.href = "empleados.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("Error al actualizar el empleado: ' . mysqli_error($conectar) . '");
    window.history.go(-1);
    </script>
    ';
}
?>