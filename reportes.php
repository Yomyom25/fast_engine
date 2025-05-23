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
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">k

    <title>Reportes</title>
</head>

<body>

    <div class="div-1200px">
        <div class="div-flex">
            <div class="container">
                <?php include 'utils/navbar.php' ?>

                <div class="sub-container">
                    <?php include 'utils/sidebar.php'; ?>

                    <div class="main-container">
                        <div class="main">
                            <h1 class="main-titulo">Reportes</h1>
                            <div class="div-reportes">


                                <!-- Tabla de reportes -->
                                <table class="tabla-reportes">
                                    <tr>
                                        <th class="font-yellow">ID</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Actividades</th>
                                        <th>Costo</th>
                                        <th>Empleados</th>
                                        <th>Servicios</th>
                                        <th>Cliente</th>
                                        <th class="font-yellow">Ver</th>
                                        <th class="font-yellow">Editar</th>
                                        <th class="font-yellow">Borrar</th>
                                    </tr>
                                    <?php
                                    require "conn.php";

                                    // Paginación
                                    $por_pagina = 5;
                                    if (isset($_GET['pagina'])) {
                                        $pagina_actual = $_GET['pagina'];
                                    } else {
                                        $pagina_actual = 1;
                                    }
                                    $inicio = ($pagina_actual - 1) * $por_pagina;

                                    $query = "SELECT * FROM reportes LIMIT $inicio, $por_pagina";
                                    $resultado = mysqli_query($conectar, $query);

                                    while ($fila = $resultado->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila["ID_Reporte"] ?></td>
                                            <td><?php echo $fila["Fecha"] ?></td>
                                            <td><?php echo $fila["Hora"] ?></td>
                                            <td><?php echo $fila["Actividades"] ?></td>
                                            <td><?php echo $fila["Costo"] ?></td>
                                            <td><?php echo $fila["Empleados"] ?></td>
                                            <td><?php echo $fila["Servicios"] ?></td>
                                            <td><?php echo $fila["Cliente"] ?></td>
                                            <td><a href="ver-reporte.php?id=<?php echo $fila["ID_Reporte"]; ?>"><img class="img-tabla" src="img/see.png" alt=""></a></td>
                                            <td><a href="editar-reporte.php?id=<?php echo $fila["ID_Reporte"]; ?> "><img class="img-tabla" src="img/edit.png" alt=""></a></td>
                                            <td><a href="#" onClick="validarDelete('eliminar-reporte.php?id=<?php echo $fila["ID_Reporte"]; ?>')"><img class="img-tabla" src="img/delete.png" alt=""></a></td>
                                        </tr>
                                    <?php } ?>

                                </table>

                                <!-- Paginación -->
                                <div class="div-number">
                                    <?php
                                    $sql_total = "SELECT COUNT(*) as total FROM reportes";
                                    $resultado_total = mysqli_query($conectar, $sql_total);

                                    $fila_total = $resultado_total->fetch_assoc();
                                    $total_registros = $fila_total['total'];

                                    $total_paginas = ceil($total_registros / $por_pagina);

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
                        <?php include 'utils/footer.php' ?>
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
