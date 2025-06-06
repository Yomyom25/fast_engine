<?php
include 'seguridad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-empleado.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Empleados</title>
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
                            <h1 class="main-titulo">Empleados</h1>
                            <div class="div-empleados">
                                <!-- Tabla de empleados -->
                                <table class="tabla-empleados">
                                    <tr>
                                        <th class="font-yellow">ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Sexo</th>
                                        <th class="font-yellow">Ver</th>
                                        <th class="font-yellow">Editar</th>
                                        <th class="font-yellow">Borrar</th>
                                    </tr>
                                    <?php
                                    require "conn.php";

                                    $query = "SELECT * FROM empleados ORDER BY ID_Empleado ASC";
                                    $resultado = mysqli_query($conectar, $query);
                                    while ($fila = $resultado->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila["ID_empleado"]; ?></td>
                                            <td><?php echo $fila["Nombre_empleado"]; ?></td>
                                            <td><?php echo $fila["Apellido_empleado"]; ?></td>
                                            <td><?php echo $fila["FechaNacimiento"]; ?></td>
                                            <td><?php echo $fila["Sexo"]; ?></td>
                                            <td><a href="ver-empleado.php?id=<?php echo $fila["ID_empleado"]; ?>"><img class="img-tabla" src="img/see.png" alt=""></a></td>
                                            <td><a href="editar-empleado.php?id=<?php echo $fila["ID_empleado"]; ?>"><img class="img-tabla" src="img/edit.png" alt=""></a></td>
                                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_empleado"]; ?>&tabla=empleados')"><img class="img-tabla" src="img/delete.png" alt=""></a></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                        <div class="content2">
                            <h2 class="main-subtitulo">Agregar empleado</h2>
                            <div class="div-add">
                                <a class="add-user" href="agregar-empleado.php">
                                    <img src="img/add-user.png" alt="">
                                </a>
                            </div>
                        </div>
                        <?php include 'utils/footer.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    function validarDelete(url) {
        var mensaje = confirm("¿Está seguro de eliminar este empleado?");
        if (mensaje == true) {
            window.location = url;
        }
    }
</script>

</html>