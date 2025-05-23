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
    <title>Registrar Servicios</title>
    <script src="ckeditor/ckeditor/ckeditor.js"></script> <!-- Cargar CKEditor -->
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
                            <h1 class="main-titulo">Registrar Servicios</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar-servicio.php" method="post">

                                            <input class="input-form" type="text" id="nombre" name="nombre_servicio" placeholder="Nombre del servicio" required>

                                            <p>Descripción del servicio:</p>
                                            <textarea name="descripcion" id="descripcion" rows="10" required></textarea>
                                            <script>
                                                CKEDITOR.replace('descripcion'); // Activar CKEditor
                                            </script>

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
</body>

</html>
