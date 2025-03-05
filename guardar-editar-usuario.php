<?php 
require "seguridad.php";
require "conn.php";

$id = $_POST['id'];
$nombre = addslashes($_POST['nombre']);
$apellido = addslashes($_POST['apellido']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);


$actualizar = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', fecha_nacimiento='$fecha_nacimiento', contrasena='$contrasena' WHERE ID_usuario ='$id'";

$query = mysqli_query($conectar, $actualizar);

if($query){
    echo '<script>
    alert("Usuario actualizado correctamente!");
    location.href = "usuarios.php?id='. $id.'"
    </script>';
} else {
    echo '<script>
    alert("Error al actualizar el usuario!");
    location.href = "editar-usuario.php?id='. $id.'"
    </script>';
}

?>