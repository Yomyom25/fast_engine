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
    <title>Vista de Reporte</title>
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
                            <h1 class="main-titulo">Vista de Reporte</h1>

                            <div class="div-usuario">
                                <div class="vista">
                                    <?php
                                    require "conn.php";

                                    $id_reporte = $_GET["id"];
                                    $query = "SELECT 
                                                reportes.ID_Reporte, reportes.Fecha, reportes.Hora, reportes.Actividades, reportes.Costo,
                                                empleados.Nombre_empleado, servicios.Nombre_servicio, clientes.Nombre_cliente
                                              FROM reportes
                                              INNER JOIN empleados ON reportes.Empleados = empleados.ID_empleado
                                              INNER JOIN servicios ON reportes.Servicios = servicios.ID_servicio
                                              INNER JOIN clientes ON reportes.Cliente = clientes.ID_cliente
                                              WHERE reportes.ID_Reporte = '$id_reporte'";
                                    
                                    $resultado = mysqli_query($conectar, $query);
                                    $fila = $resultado->fetch_array();
                                    ?>

                                    <p class='text-bold'>Fecha del Reporte:</p>
                                    <p><?php echo $fila["Fecha"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Hora del Reporte:</p>
                                    <p><?php echo $fila["Hora"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Actividades:</p>
                                    <p><?php echo $fila["Actividades"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Costo:</p>
                                    <p><?php echo "$" . number_format($fila["Costo"], 2) . "<hr>"; ?></p>

                                    <p class='text-bold'>Empleado:</p>
                                    <p><?php echo $fila["Nombre_empleado"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Servicio:</p>
                                    <p><?php echo $fila["Nombre_servicio"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Cliente:</p>
                                    <p><?php echo $fila["Nombre_cliente"] . "<hr>"; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="content1">
                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Editar Reporte</h2>
                                    <a href="editar-reporte.php?id=<?php echo $fila['ID_Reporte']; ?>">
                                        <img src="img/edit.png" alt="">
                                    </a>
                                </div>

                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Regresar</h2>
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
    </div>
</body>

</html>
