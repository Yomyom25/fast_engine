<?php
include 'seguridad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-empleado.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Registrar Empleado</title>
</head>

<body>

    <div class="div-1200px">
        <div class="div-flex">
            <div class="container">
                <?php include 'utils/navbar.php'; ?>

                <div class="sub-container">
                    <?php include 'utils/sidebar.php'; ?>

                    <div class="main-container">
                        <div class="main">
                            <h1 class="main-titulo">Registrar Empleado</h1>
                            <div class="div-empleados">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar-empleado.php" method="post" enctype="multipart/form-data">

                                            <input class="input-form" type="text" id="name" name="nombre" placeholder="Nombre(s)" required>

                                            <input class="input-form" type="text" id="last_name" name="apellido" placeholder="Apellido(s)" required>

                                            <p class="" for="birthdate">Fecha de Nacimiento:</p>
                                            <input class="input-form" type="date" id="birthdate" name="fecha_nacimiento" required>

                                            <p class="" for="gender">Sexo:</p>
                                            <select class="input-form" id="gender" name="sexo" required>
                                                <option value="">Seleccione el sexo</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>

                                            <p>Foto del empleado:</p>
                                            <input type="file" name="foto_emp" id="">

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
                                <a href="empleados.php">
                                    <img src="img/back.png" alt="">
                                </a>
                            </div>
                        </div>
                        <?php include 'utils/footer.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
