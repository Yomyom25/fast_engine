<?php
include 'seguridad.php';
require 'conn.php';

$id_cliente = $_POST['id_cliente'];
$nombre = $_POST['nombre'];
$empresa = $_POST['empresa'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// actualizar los datos del cliente
$actualizar = "UPDATE clientes 
               SET Nombre_cliente='$nombre', Empresa='$empresa', 
                   Telefono='$telefono', Correo='$correo' 
               WHERE ID_cliente='$id_cliente'";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '<script>
    alert("Cliente actualizado correctamente!");
    location.href = "clientes.php";
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el cliente!");
    history.go(-1);
    </script>';
}
?>