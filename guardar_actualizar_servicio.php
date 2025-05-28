<?php
include 'seguridad.php';
require 'conn.php';

$id_servicio = $_POST['id_servicio'];
$nombre_servicio = $_POST['nombre_servicio'];
$descripcion = $_POST['descripcion'];

// actualizar los datos del servicio
$actualizar = "UPDATE servicios 
               SET Nombre_servicio='$nombre_servicio', Descripcion='$descripcion' 
               WHERE ID_servicio='$id_servicio'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '<script>
    alert("Servicio actualizado correctamente!");
    location.href = "servicios.php";
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el servicio!");
    history.go(-1);
    </script>';
}
?>