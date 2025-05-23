<?php
include 'seguridad.php';
require 'conn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Si no llega ID, redirige o muestra error
    header("Location: clientes.php");
    exit;
}

$id_cliente = intval($_GET['id']);

// Consulta para obtener datos del cliente
$sql = "SELECT * FROM clientes WHERE ID_cliente = $id_cliente";
$resultado = mysqli_query($conectar, $sql);

if ($resultado->num_rows == 0) {
    // No encontró cliente
    header("Location: clientes.php");
    exit;
}

$cliente = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style-principal.css" />
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css" />
    <title>Editar Cliente</title>
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
                            <h1 class="main-titulo">Editar Cliente</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar_actualizar_cliente.php" method="post">
                                            <!-- Hidden para enviar el ID del cliente -->
                                            <input type="hidden" name="id_cliente" value="<?php echo $cliente['ID_cliente']; ?>">

                                            <input class="input-form" type="text" name="nombre" placeholder="Nombre del cliente" value="<?php echo htmlspecialchars($cliente['Nombre_cliente']); ?>" required>

                                            <input class="input-form" type="text" name="empresa" placeholder="Empresa" value="<?php echo htmlspecialchars($cliente['Empresa']); ?>" required>

                                            <input class="input-form" type="text" name="telefono" placeholder="Teléfono" maxlength="10" value="<?php echo htmlspecialchars($cliente['Telefono']); ?>" required>

                                            <input class="input-form" type="email" name="correo" placeholder="Correo electrónico" value="<?php echo htmlspecialchars($cliente['Correo']); ?>" required>

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
                                <a href="clientes.php">
                                    <img src="img/back.png" alt="" />
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
