<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <title>Vista</title>
</head>

<body>
    <?php include 'seguridad.php' ?>
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
                            <h1 class="main-titulo">Vista de usuario </h1>

                            <div class="div-usuario">
                                <div class="vista">
                                    <?php
                                    require "conn.php";

                                    $id_usuario = $_GET["id"];
                                    $todos = "SELECT * FROM usuarios WHERE ID = '$id_usuario' ";

                                    $resultado = mysqli_query($conectar, $todos);

                                    $fila = $resultado->fetch_array();
                                    ?>
                                    <p class='text-bold'>Nombre del usuario:</p>
                                    <p><?php echo $fila["nombre"] . "&nbsp;" . $fila["apellido"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Correo electronico:</p>
                                    <p><?php echo $fila["email"] . "<br>" . "<hr>"; ?></p>

                                    <p class='text-bold'>Contraseña:</p>
                                    <?php echo $fila["contrasena"] . "<br>" . "<hr>"; ?>

                                    <p class='text-bold'>Fecha de nacimiento:</p>
                                    <?php echo $fila["fecha_nacimiento"] . "<br>"; ?>

                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="content1">
                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Editar usuario</h2>
                                    <a  href="editar-usuario.php?id=<?php echo $fila['ID']; ?>">
                                        <img src="img/edit.png" alt="">
                                    </a>
                                </div>

                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Regresar</h2>
                                    <a  href="usuarios.php">
                                        <img src="img/back.png" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- <div class="content2">
                                <h2>content2</h2>
                            </div> -->

                            <?php include 'utils/footer.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>