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
            <h1>Bienvenido</h1>
            <div class="img-logo">
                <a href="index.php">
                    <img class="logo" src="img/logo.png" alt="Logo">
                </a>
            </div>
            <p>Ingrese sus credenciales para acceder al sistema</p>

            <form action="autentificar.php" method="post" name="login_plantilla">
                <?php
                $errorusuario = isset($_GET["errorusuario"]) && $_GET["errorusuario"] === "SI";
                if ($errorusuario) {
                    echo "<p class='error'>Usuario o contraseña incorrectos</p>";
                }
                ?>
                <input type="text" name="email" placeholder="correo" class="input-login ancho-uniforme">
                <input type="password" name="contrasena" placeholder="Contraseña" class="input-login ancho-uniforme">
                <br>
                <input type="submit" value="Iniciar sesión" class="btn-login ancho-uniforme btn">

                <a href="registro.php" class="registrar">Crear una cuenta</a>
            </form>
        </div>
        <div class="footer">
            <p class="letras"><span> © <?php echo date("Y"); ?> Todos los Derechos Reservados <a href="_blank" class="letra-footer">Fast Engine</a></span></p>
        </div>

    </div>

    <script src="scripts/validacion.js"></script>
</body>

</html>