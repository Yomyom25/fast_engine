<?php
include 'seguridad.php';
require 'conn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: servicios.php");
    exit;
}

$id_servicio = intval($_GET['id']);

$sql = "SELECT * FROM servicios WHERE ID_servicio = $id_servicio";
$resultado = mysqli_query($conectar, $sql);

if ($resultado->num_rows == 0) {
    header("Location: servicios.php");
    exit;
}

$servicio = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <title>Editar Servicio</title>
    <script src="ckeditor/ckeditor/ckeditor.js"></script>
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
                            <h1 class="main-titulo">Editar Servicio</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar_actualizar_servicio.php" method="post">
                                            <input type="hidden" name="id_servicio" value="<?php echo $servicio['ID_servicio']; ?>">

                                            <input class="input-form" type="text" name="nombre_servicio" placeholder="Nombre del servicio" value="<?php echo htmlspecialchars($servicio['Nombre_servicio']); ?>" required>

                                            <p>Descripción del servicio:</p>
                                            <textarea name="descripcion" id="descripcion" rows="10" required><?php echo htmlspecialchars($servicio['Descripcion']); ?></textarea>
                                            <script>
                                                CKEDITOR.replace('descripcion');
                                            </script>

                                            <div class="btn-form">
                                                <input class="update-btn" type="submit" value="Guardar Cambios">
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
