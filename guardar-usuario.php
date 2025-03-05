<?php
require "seguridad.php";
require "conn.php";
// Proteccion de inyecciones SQL

$nombre = addslashes($_POST ['nombre']);
$apellido = addslashes($_POST['apellido']);
$email = addslashes($_POST['email']);
$contrasena = addslashes($_POST['contrasena']);
$fecha_nacimiento = addslashes($_POST['fecha_nacimiento']);

$password =  password_hash($contrasena, PASSWORD_BCRYPT);


// Validar usuario
$verificar  = mysqli_query($conectar, "SELECT * FROM usuarios WHERE email = '$email' ");

if (mysqli_num_rows($verificar) > 0){
    echo '<script>
    alert("El correo ya está registrado!");
    location.href = "agregar-usuario.php"
    </script>';
    exit();  // Salimos para evitar ejecutar la consulta de insertar si el usuario ya existe.
}

// Consulta SQL para insertar los datos en la tabla usuarios
$insertar = "INSERT INTO usuarios (nombre, apellido, email, contrasena, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$email', '$password', '$fecha_nacimiento')";

// Ejecutar la consulta
$query = mysqli_query($conectar, $insertar);

// Aviso
if ($query) {
    echo '<script>
    alert("Registro exitoso!");
    location.href = "usuarios.php"
    </script>';
} else {
    echo '<script>
    alert("Error al registrar!");
    location.href = "agregar-usuario.php"
    </script>';
}
?>