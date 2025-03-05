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
                        <?php
                        require "conn.php";
                        $id_usuario = $_GET["id"];

                        $todos = "SELECT * FROM usuarios WHERE ID = '$id_usuario' ";
                        $resultado = mysqli_query($conectar, $todos);
                        $fila = $resultado->fetch_array();
                        ?>
                        <div class="main">
                            <h1 class="main-titulo">Editar usuario</h1>
                            <div class="div-usuarios">

                                <div class="form-container">
                                    <form action="guardar-editar_usuario.php" method="post">

                                        <input class="input-login ancho-uniforme" value="<?php echo $fila['nombre'] ?>" type="text" name="nombre" placeholder="Nombre(s)">
                                        <input class="input-login ancho-uniforme" value="<?php echo $fila['apellido'] ?>" type="text" name="apellido" placeholder="Apellido">

                                        <div class="input-login correo">
                                            <?php echo $fila['email'] ?>
                                        </div>

                                        <!-- <div class="input-login correo">
                            <?php echo $fila['contrasena'] ?>
                        </div> -->

                                        <p class="entrada-label" for="birthdate">Fecha de nacimiento:</p>
                                        <input class="input-login ancho-uniforme" value="<?php echo $fila['fecha_nacimiento'] ?>" type="date" name="fecha_nacimiento" required>

                                        <input type="hidden" name="id" value="<?php echo $fila["ID"]; ?>">
                                        <input type="hidden" name="email" value="<?php echo $fila["email"]; ?>">
                                        <button class="btn-cuenta ancho-uniforme entrada-label" type="submit" value=>Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="content2">
                            <h2 class="main-subtitulo">Regresar</h2>
                            <div class="div-add">
                                <a href="ver-usuario.php?id=<?php echo $fila["ID"]; ?>">
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