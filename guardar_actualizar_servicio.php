<?php
include 'seguridad.php';
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_servicio = isset($_POST['id_servicio']) ? intval($_POST['id_servicio']) : 0;
    $nombre_servicio = isset($_POST['nombre_servicio']) ? mysqli_real_escape_string($conectar, trim($_POST['nombre_servicio'])) : '';
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conectar, trim($_POST['descripcion'])) : '';

    if ($id_servicio > 0 && $nombre_servicio !== '' && $descripcion !== '') {
        $sql = "UPDATE servicios SET 
                    Nombre_servicio = '$nombre_servicio', 
                    Descripcion = '$descripcion' 
                WHERE ID_servicio = $id_servicio";

        if (mysqli_query($conectar, $sql)) {
            header("Location: servicios.php?msg=actualizado");
            exit;
        } else {
            echo "Error al actualizar el servicio: " . mysqli_error($conectar);
        }
    } else {
        echo "Faltan datos obligatorios.";
    }
} else {
    header("Location: servicios.php");
    exit;
}
?>
