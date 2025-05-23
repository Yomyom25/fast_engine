<?php 
require "seguridad.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <link rel="stylesheet" type="text/css" href="css/style-servicio.css">
    <title>Vista de Servicio</title>
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
                            <h1 class="main-titulo">Vista de Servicio</h1>

                            <div class="div-servicio">
                                <div class="vista">
                                    <?php
                                    require "conn.php";

                                    $id_servicio = $_GET["id"];
                                    $query = "SELECT * FROM servicios WHERE ID_servicio = '$id_servicio'";
                                    $resultado = mysqli_query($conectar, $query);
                                    $fila = $resultado->fetch_array();
                                    ?>

                                    <p class='text-bold'>Nombre del Servicio:</p>
                                    <p><?php echo $fila["Nombre_servicio"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Descripción:</p>
                                    <div class="descripcion-servicio">
                                        <?php echo $fila["Descripcion"]; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="content1">
                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Editar Servicio</h2>
                                    <a href="editar-servicio.php?id=<?php echo $fila['ID_servicio']; ?>">
                                        <img src="img/edit.png" alt="">
                                    </a>
                                </div>

                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Regresar</h2>
                                    <a href="servicios.php">
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
    </div>
</body>

</html>


