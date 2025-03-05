<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION["autentificado"]) && $_SESSION["autentificado"] === "SI") {
    header("Location: principal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="div-login">

        <div class="background_login">
            <h1>Registrate</h1>
            <div class="img-logo">
                <a href="index.php">
                    <img class="logo" src="img/logo.png" alt="Logo">
                </a>
            </div>
            <p>Ingrese sus datos:</p>

            <form action="guardar-usuario.php" method="post" name="login_plantilla">

                    <input class="input-login" type="text" id="name" name="nombre" placeholder="Nombre(s)">

                    <input class="input-login" type="text" id="last_name" name="apellido" placeholder="Apellido">

                    <input class="input-login" type="email" id="email" name="email" placeholder="Correo electronico">

                    <input class="input-login" type="text" id="password" name="contrasena" placeholder="contraseña" maxlength="10">

                    <p class="" for="birthdate">Fecha de nacimiento:</p>
                    <input class="input-login" type="date" id="birthdate" name="fecha_nacimiento" required>

                <input type="submit" value="Agregar Usuario" class="registro ancho-uniforme btn">

            </form>

            <span class="text-small">Al hacer click en "registrar", aceptas los <a href="">Términos y condiciones</a> y la <a href="">Política de datos</a> y la <a href="">Política de cookies</a>. Es posible que te enviemos notificaciones por SMS, que puedes desactivar cuando quieras</span>
        </div>


    </div>

    <script src="scripts/validacion.js"></script>
</body>

</html>