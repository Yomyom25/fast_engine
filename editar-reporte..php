<?php
include 'seguridad.php';
require 'conn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: reportes.php");
    exit;
}

$id_reporte = intval($_GET['id']);

$sql = "SELECT * FROM reportes WHERE ID_Reporte = $id_reporte";
$resultado = mysqli_query($conectar, $sql);

if ($resultado->num_rows == 0) {
    header("Location: reportes.php");
    exit;
}

$reporte = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <title>Editar Reporte</title>
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
                            <h1 class="main-titulo">Editar Reporte</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar_actualizar_reporte.php" method="post">
                                            <input type="hidden" name="id_reporte" value="<?php echo $reporte['ID_Reporte']; ?>">

                                            <p for="fecha">Fecha del reporte:</p>
                                            <input class="input-form" type="date" id="fecha" name="fecha" value="<?php echo $reporte['Fecha']; ?>" required>

                                            <p for="hora">Hora del reporte:</p>
                                            <input class="input-form" type="time" id="hora" name="hora" value="<?php echo $reporte['Hora']; ?>" required>

                                            <textarea class="input-form" id="actividades" name="actividades" rows="4" required><?php echo htmlspecialchars($reporte['Actividades']); ?></textarea>

                                            <input class="input-form" type="number" id="costo" name="costo" value="<?php echo $reporte['Costo']; ?>" required>

                                            <p for="empleado">Empleado responsable:</p>
                                            <select class="input-form" id="empleado" name="empleado" required>
                                                <?php
                                                $query = "SELECT ID_Empleado, Nombre_Empleado FROM empleados";
                                                $resultado_empleados = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado_empleados)) {
                                                    $selected = $fila['ID_Empleado'] == $reporte['Empleados'] ? "selected" : "";
                                                    echo "<option value='{$fila['ID_Empleado']}' $selected>{$fila['Nombre_Empleado']}</option>";
                                                }
                                                ?>
                                            </select>

                                            <p for="servicio">Servicio relacionado:</p>
                                            <select class="input-form" id="servicio" name="servicio" required>
                                                <?php
                                                $query = "SELECT ID_Servicio, Nombre_Servicio FROM servicios";
                                                $resultado_servicios = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado_servicios)) {
                                                    $selected = $fila['ID_Servicio'] == $reporte['Servicios'] ? "selected" : "";
                                                    echo "<option value='{$fila['ID_Servicio']}' $selected>{$fila['Nombre_Servicio']}</option>";
                                                }
                                                ?>
                                            </select>

                                            <p for="cliente">Cliente relacionado:</p>
                                            <select class="input-form" id="cliente" name="cliente" required>
                                                <?php
                                                $query = "SELECT ID_Cliente, Nombre_Cliente FROM clientes";
                                                $resultado_clientes = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado_clientes)) {
                                                    $selected = $fila['ID_Cliente'] == $reporte['Cliente'] ? "selected" : "";
                                                    echo "<option value='{$fila['ID_Cliente']}' $selected>{$fila['Nombre_Cliente']}</option>";
                                                }
                                                ?>
                                            </select>

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
                                <a href="reportes.php">
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
