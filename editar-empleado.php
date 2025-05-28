<?php
include 'seguridad.php';
require 'conn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: empleados.php");
    exit;
}

$id_empleado = intval($_GET['id']);

$sql = "SELECT * FROM empleados WHERE ID_empleado = $id_empleado";
$resultado = mysqli_query($conectar, $sql);

if ($resultado->num_rows == 0) {
    header("Location: empleados.php");
    exit;
}

$empleado = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-empleado.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <title>Editar Empleado</title>
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
                            <h1 class="main-titulo">Editar Empleado</h1>
                            <div class="div-empleados">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar_actualizar_empleado.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_empleado" value="<?php echo $empleado['ID_empleado']; ?>">

                                            <input class="input-form" type="text" name="nombre" placeholder="Nombre(s)" value="<?php echo htmlspecialchars($empleado['Nombre_empleado']); ?>" required>

                                            <input class="input-form" type="text" name="apellido" placeholder="Apellido(s)" value="<?php echo htmlspecialchars($empleado['Apellido_empleado']); ?>" required>

                                            <p>Fecha de Nacimiento:</p>
                                            <input class="input-form" type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($empleado['FechaNacimiento']); ?>" required>

                                            <p>Sexo:</p>
                                            <select class="input-form" name="sexo" required>
                                                <option value="">Seleccione el sexo</option>
                                                <option value="M" <?php echo $empleado['Sexo'] == 'M' ? 'selected' : ''; ?>>Masculino</option>
                                                <option value="F" <?php echo $empleado['Sexo'] == 'F' ? 'selected' : ''; ?>>Femenino</option>
                                            </select>

                                            <?php if(!empty($empleado['ruta_foto'])): ?>
                                                <p>Foto actual:</p>
                                                <img src="<?php echo $empleado['ruta_foto']; ?>" alt="Foto actual del empleado" style="width: 250px; height: auto; margin-bottom: 10px;">
                                            <?php endif; ?>
                                            
                                            <p>Cambiar foto:</p>
                                            <input type="file" name="foto_emp" id="foto_emp">
                                            <!-- FIN DE CAMBIOS -->

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