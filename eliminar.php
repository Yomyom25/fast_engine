<?php
require "seguridad.php";
require "conn.php";

$id = $_GET["id"];
$tabla = $_GET["tabla"];

$tablas_permitidas = ["usuarios", "reportes", "clientes", "servicios", "empleados"];

if (!in_array($tabla, $tablas_permitidas)) {
    die("Operación no permitida");
}

$columna_id = [
    "usuarios" => "ID_usuario",
    "reportes" => "ID_Reporte",
    "clientes" => "ID_cliente",
    "servicios" => "ID_servicio",
    "empleados" => "ID_empleado",

];

$eliminar = "DELETE FROM $tabla WHERE {$columna_id[$tabla]} = '$id'";
$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header("location: $tabla.php");
} else {
    echo "No se pudo eliminar el registro";
}
?>
