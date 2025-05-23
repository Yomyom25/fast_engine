<?php
include 'seguridad.php';
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = isset($_POST['id_cliente']) ? intval($_POST['id_cliente']) : 0;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conectar, trim($_POST['nombre'])) : '';
    $empresa = isset($_POST['empresa']) ? mysqli_real_escape_string($conectar, trim($_POST['empresa'])) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conectar, trim($_POST['telefono'])) : '';
    $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conectar, trim($_POST['correo'])) : '';

    if ($id_cliente > 0 && $nombre !== '' && $empresa !== '' && $telefono !== '' && $correo !== '') {
        $sql = "UPDATE clientes SET 
                    Nombre_cliente = '$nombre',
                    Empresa = '$empresa',
                    Telefono = '$telefono',
                    Correo = '$correo'
                WHERE ID_cliente = $id_cliente";

        if (mysqli_query($conectar, $sql)) {
            // Redirigir a la lista o mostrar mensaje de éxito
            header("Location: clientes.php?msg=actualizado");
            exit;
        } else {
            echo "Error al actualizar el cliente: " . mysqli_error($conectar);
        }
    } else {
        echo "Faltan datos obligatorios.";
    }
} else {
    header("Location: clientes.php");
    exit;
}
?>
