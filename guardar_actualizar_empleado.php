<?php
include 'seguridad.php';
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_empleado = isset($_POST['id_empleado']) ? intval($_POST['id_empleado']) : 0;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conectar, trim($_POST['nombre'])) : '';
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conectar, trim($_POST['apellido'])) : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? mysqli_real_escape_string($conectar, $_POST['fecha_nacimiento']) : '';
    $sexo = isset($_POST['sexo']) ? mysqli_real_escape_string($conectar, $_POST['sexo']) : '';

    if ($id_empleado > 0 && $nombre !== '' && $apellido !== '' && $fecha_nacimiento !== '' && $sexo !== '') {
        $sql = "UPDATE empleados SET 
                    Nombre_empleado = '$nombre', 
                    Apellido_empleado = '$apellido', 
                    FechaNacimiento = '$fecha_nacimiento', 
                    Sexo = '$sexo' 
                WHERE ID_empleado = $id_empleado";

        if (mysqli_query($conectar, $sql)) {
            header("Location: empleados.php?msg=actualizado");
            exit;
        } else {
            echo "Error al actualizar el empleado: " . mysqli_error($conectar);
        }
    } else {
        echo "Faltan datos obligatorios.";
    }
} else {
    header("Location: empleados.php");
    exit;
}
?>
