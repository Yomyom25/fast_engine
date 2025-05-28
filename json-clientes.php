<?php 
require 'seguridad.php';
require 'conn.php';

$todos_datos = "SELECT * FROM clientes";
$resultado = mysqli_query($conectar, $todos_datos);

//verificar si hay datos
if ($resultado -> num_rows >0) {
    $datos = [];
}

//fila como arreglo
while ($fila = $resultado-> fetch_assoc()) {
    $datos[] = $fila;
}

$json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

$archivo = "clientes.json";

if (file_put_contents($archivo, $json)) {
    echo '<script>
    alert("Los datos se guardaron en JSON");
    location.href="clientes.php";
    </script>';
}
?>