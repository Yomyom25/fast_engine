<?php
include 'seguridad.php';
require "conn.php"; // Archivo de conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">
    <title>Registrar Reportes</title>
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
                            <h1 class="main-titulo">Registrar Reportes</h1>
                            <div class="div-usuarios">
                                <div class="contenedor">
                                    <div class="div-form">
                                        <form action="guardar-reporte.php" method="post">

                                            <p for="fecha">Fecha del reporte:</p>
                                            <input class="input-form" type="date" id="fecha" name="fecha" required>

                                            <p for="hora">Hora del reporte:</p>
                                            <input class="input-form" type="time" id="hora" name="hora" required>

                                            <textarea class="input-form" id="actividades" name="actividades" placeholder="Actividades realizadas" rows="4" required></textarea>

                                            <input class="input-form" type="number" id="costo" name="costo" placeholder="Costo" required>

                                            <p for="empleado">Empleado responsable:</p>
                                            <select class="input-form" id="empleado" name="empleado" required>
                                                <option value="" selected>Seleccione un empleado</option>
                                                <?php
                                                $query = "SELECT ID_Empleado, Nombre_Empleado FROM empleados";
                                                $resultado = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                                    echo "<option value='{$fila['ID_Empleado']}'>{$fila['Nombre_Empleado']}</option>";
                                                }
                                                ?>
                                            </select>

                                            <p for="servicio">Servicio relacionado:</p>
                                            <select class="input-form" id="servicio" name="servicio" required>
                                                <option value="" selected>Seleccione un servicio</option>
                                                <?php
                                                $query = "SELECT ID_Servicio, Nombre_Servicio FROM servicios";
                                                $resultado = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                                    echo "<option value='{$fila['ID_Servicio']}'>{$fila['Nombre_Servicio']}</option>";
                                                }
                                                ?>
                                            </select>

                                            <p for="cliente">Cliente relacionado:</p>
                                            <select class="input-form" id="cliente" name="cliente" required>
                                                <option value="" selected>Seleccione un cliente</option>
                                                <?php
                                                $query = "SELECT ID_Cliente, Nombre_Cliente FROM clientes";
                                                $resultado = mysqli_query($conectar, $query);
                                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                                    echo "<option value='{$fila['ID_Cliente']}'>{$fila['Nombre_Cliente']}</option>";
                                                }
                                                ?>
                                            </select>

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
