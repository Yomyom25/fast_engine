<?php
include 'seguridad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Usuarios</title>
</head>

<body>

    <div class="div-1200px">
        <div class="div-flex">
            <div class="container">
                <?php include 'utils/navbar.php' ?>

                <div class="sub-container">
                    <?php
                    include 'utils/sidebar.php';
                    ?>

                    <div class="main-container">
                        <div class="main">
                            <h1 class="main-titulo">Registrar Usuarios</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar-usuario.php" method="post">

                                            <input class="input-form" type="text" id="name" name="nombre" placeholder="Nombre(s)">

                                            <input class="input-form" type="text" id="last_name" name="apellido" placeholder="Apellido">

                                            <input class="input-form" type="email" id="email" name="email" placeholder="Correo electronico">

                                            <input class="input-form" type="text" id="password" name="contrasena" placeholder="contraseña" maxlength="10">

                                            <p class="" for="birthdate">Fecha de nacimiento:</p>
                                            <input class="input-form" type="date" id="birthdate" name="fecha_nacimiento" required>

                                            <div class="btn-form">
                                                <input class="update-btn" type="submit" value="Agregar">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content2">
                            <h2 class="main-subtitulo">Regresar</h2>
                            <div class="div-add">
                                <a href="usuarios.php">
                                    <img src="img/back.png" alt="">
                                </a>
                            </div>
                        </div>
                        <?php include 'utils/footer.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>