<?php
include 'seguridad.php';
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reporte = isset($_POST['id_reporte']) ? intval($_POST['id_reporte']) : 0;
    $fecha = mysqli_real_escape_string($conectar, trim($_POST['fecha']));
    $hora = mysqli_real_escape_string($conectar, trim($_POST['hora']));
    $actividades = mysqli_real_escape_string($conectar, trim($_POST['actividades']));
    $costo = floatval($_POST['costo']);
    $empleado = intval($_POST['empleado']);
    $servicio = intval($_POST['servicio']);
    $cliente = intval($_POST['cliente']);

    if ($id_reporte > 0 && $fecha && $hora && $actividades && $costo && $empleado && $servicio && $cliente) {
        $sql = "UPDATE reportes SET 
                    Fecha = '$fecha',
                    Hora = '$hora',
                    Actividades = '$actividades',
                    Costo = $costo,
                    Empleados = $empleado,
                    Servicios = $servicio,
                    Cliente = $cliente
                WHERE ID_Reporte = $id_reporte";

        if (mysqli_query($conectar, $sql)) {
            header("Location: reportes.php?msg=actualizado");
            exit;
        } else {
            echo "Error al actualizar el reporte: " . mysqli_error($conectar);
        }
    } else {
        echo "Faltan datos obligatorios.";
    }
} else {
    header("Location: reportes.php");
    exit;
}
?>
