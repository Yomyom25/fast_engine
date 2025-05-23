<?php
include 'seguridad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-reporte.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Reportes</title>
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
                            <h1 class="main-titulo">Reportes</h1>

                            <!-- Barra de búsqueda -->
                            <div class="div-buscador">
                                <form action="reportes.php" method="post">
                                    <label for="buscar_fecha">Buscar por fecha:</label>
                                    <input class="buscador" type="date" name="buscar_fecha" id="buscar_fecha">
                                    <button class="btn_buscar" name="buscar">Buscar</button>
                                </form>
                            </div>

                            <div class="div-reportes">
                                <!-- Tabla de reportes -->
                                <table class="tabla-reportes">
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Actividades</th>
                                        <th>Costo</th>
                                        <th>Empleado</th>
                                        <th>Servicio</th>
                                        <th>Cliente</th>
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    </tr>
                                    <?php
                                    require "conn.php";

                                    // Defino siempre esta variable para evitar el error
                                    $por_pagina = 5;

                                    if (isset($_POST['buscar']) && !empty($_POST['buscar_fecha'])) {
                                        $fecha = $_POST['buscar_fecha'];

                                        $query = "SELECT 
                                                    reportes.ID_Reporte, reportes.Fecha, reportes.Hora, reportes.Actividades, reportes.Costo,
                                                    empleados.Nombre_empleado, servicios.Nombre_servicio, clientes.Nombre_cliente
                                                  FROM reportes
                                                  INNER JOIN empleados ON reportes.Empleados = empleados.ID_empleado
                                                  INNER JOIN servicios ON reportes.Servicios = servicios.ID_servicio
                                                  INNER JOIN clientes ON reportes.Cliente = clientes.ID_cliente
                                                  WHERE reportes.Fecha = '$fecha'";
                                        $resultado = mysqli_query($conectar, $query);

                                        if ($resultado->num_rows > 0) {
                                            while ($fila = $resultado->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$fila['ID_Reporte']}</td>
                                                        <td>{$fila['Fecha']}</td>
                                                        <td>{$fila['Hora']}</td>
                                                        <td>{$fila['Actividades']}</td>
                                                        <td>{$fila['Costo']}</td>
                                                        <td>{$fila['Nombre_empleado']}</td>
                                                        <td>{$fila['Nombre_servicio']}</td>
                                                        <td>{$fila['Nombre_cliente']}</td>
                                                        <td><a href='ver-reporte.php?id={$fila['ID_Reporte']}'><img class='img-tabla' src='img/see.png' alt=''></a></td>
                                                        <td><a href='editar-reporte.php?id={$fila['ID_Reporte']}'><img class='img-tabla' src='img/edit.png' alt=''></a></td>
                                                        <td><a href='#' onClick='validarDelete(\"eliminar-reporte.php?id={$fila['ID_Reporte']}&tabla=reportes\")'><img class='img-tabla' src='img/delete.png' alt=''></a></td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td class='alerta' colspan='11'>NO SE ENCONTRARON RESULTADOS</td></tr>";
                                        }
                                    } else {
                                        // Paginación y consulta sin filtro de búsqueda
                                        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                                        $inicio = ($pagina_actual - 1) * $por_pagina;

                                        $query = "SELECT 
                                                    reportes.ID_Reporte, reportes.Fecha, reportes.Hora, reportes.Actividades, reportes.Costo,
                                                    empleados.Nombre_empleado, servicios.Nombre_servicio, clientes.Nombre_cliente
                                                  FROM reportes
                                                  INNER JOIN empleados ON reportes.Empleados = empleados.ID_empleado
                                                  INNER JOIN servicios ON reportes.Servicios = servicios.ID_servicio
                                                  INNER JOIN clientes ON reportes.Cliente = clientes.ID_cliente
                                                  LIMIT $inicio, $por_pagina";
                                        $resultado = mysqli_query($conectar, $query);

                                        while ($fila = $resultado->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>{$fila['ID_Reporte']}</td>
                                                    <td>{$fila['Fecha']}</td>
                                                    <td>{$fila['Hora']}</td>
                                                    <td>{$fila['Actividades']}</td>
                                                    <td>{$fila['Costo']}</td>
                                                    <td>{$fila['Nombre_empleado']}</td>
                                                    <td>{$fila['Nombre_servicio']}</td>
                                                    <td>{$fila['Nombre_cliente']}</td>
                                                    <td><a href='ver-reporte.php?id={$fila['ID_Reporte']}'><img class='img-tabla' src='img/see.png' alt=''></a></td>
                                                    <td><a href='editar-reporte.php?id={$fila['ID_Reporte']}'><img class='img-tabla' src='img/edit.png' alt=''></a></td>
                                                    <td><a href='#' onClick='validarDelete(\"eliminar-reporte.php?id={$fila['ID_Reporte']}&tabla=reportes\")'><img class='img-tabla' src='img/delete.png' alt=''></a></td>
                                                </tr>";
                                        }
                                    }
                                    ?>
                                </table>

                                <!-- Paginación -->
                                <div class="div-number">
                                    <?php
                                    $sql_total = "SELECT COUNT(*) as total FROM reportes";
                                    $resultado_total = mysqli_query($conectar, $sql_total);
                                    $fila_total = $resultado_total->fetch_assoc();
                                    $total_registros = $fila_total['total'];

                                    // Evito división por cero si $por_pagina no está definido (pero ya está definido arriba)
                                    $total_paginas = ($por_pagina > 0) ? ceil($total_registros / $por_pagina) : 1;

                                    for ($i = 1; $i <= $total_paginas; $i++) {
                                        echo "<a href='?pagina=$i'>$i</a> ";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="content2">
                            <h2 class="main-subtitulo">Agregar reporte</h2>
                            <div class="div-add">
                                <a class="add-user" href="agregar-reporte.php">
                                    <img src="img/add-user.png" alt="">
                                </a>
                            </div>

                            <div class="btn">
                                <a class="btn-green" href="reporte.php">Generar Reporte</a>
                            </div>
                        </div>

                        <?php include 'utils/footer.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function validarDelete(url) {
        var mensaje = confirm("¿Está seguro de eliminar este reporte?");
        if (mensaje == true) {
            window.location = url;
        }
    }
</script>

</html>
