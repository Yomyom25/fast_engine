<?php 
include 'seguridad.php';
require 'conn.php';

$id_reporte = $_POST['id_reporte'];
$fecha = addslashes($_POST['fecha']);
$hora = addslashes($_POST['hora']);
$actividades = addslashes($_POST['actividades']);
$costo = addslashes($_POST['costo']);
$empleado = addslashes($_POST['empleado']);
$servicio = addslashes($_POST['servicio']);
$cliente = addslashes($_POST['cliente']);

$actualizar = "UPDATE reportes SET 
                Fecha = '$fecha',
                Hora = '$hora',
                Actividades = '$actividades',
                Costo = '$costo',
                Empleados = '$empleado',
                Servicios = '$servicio',
                Cliente = '$cliente'
              WHERE ID_Reporte = '$id_reporte'";

$query = mysqli_query($conectar, $actualizar);

if($query){
    echo '<script>
    alert("Reporte actualizado correctamente!");
    location.href = "reportes.php?id='. $id_reporte.'"
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el reporte!");
    location.href = "editar-reporte.php?id='. $id_reporte.'"
    </script>';
}
?>