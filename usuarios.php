<?php
include 'seguridad.php';
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Pagina Principal</title>
</head>

<body>

    <div class="div-1200px">
        <div class="div-flex">
            <div class="container">
                <?php include 'utils/navbar.php' ?>

                <div class="sub-container">
                    <?php
                    include 'utils/sidebar.php';
                    ?>

                    <div class="main-container">
                        <div class="main">
                            <h1>Usuarios</h1>

                            <div class="div-usuarios">

                                <!-- Tabla de usuarios -->
                                <table class="tabla-usuarios">
                                    <tr>
                                        <th class="yellow">ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th class="yellow">Ver</th>
                                        <th class="yellow">Editar</th>
                                        <th class="yellow">Borrar</th>
                                    </tr>
                                    <?php
                                    require "conn.php";

                                    $todos = "SELECT * FROM usuarios ORDER BY id ASC";
                                    $resultado = mysqli_query($conectar, $todos);
                                    while ($fila = $resultado->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila["ID"] ?></td>
                                            <td><?php echo $fila["nombre"] ?></td>
                                            <td><?php echo $fila["apellido"] ?></td>
                                            <td><?php echo $fila["email"] ?></td>
                                            <td><a href=""><img class="img-tabla" src="img/see.png" alt=""></a></td>
                                            <td><a href=""><img class="img-tabla" src="img/edit.png" alt=""></a></td>
                                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID"]; ?>')"><img class="img-tabla" src="img/delete.png" alt=""></a></td>
                                        </tr>
                                    <?php } ?>

                                </table>

                            </div>
                        </div>


                        <div class="content2">
                            <h2>Agregar usuario</h2>
                            <a class="add-user" href="crear_usuario.php">
                                <img src="" alt="">
                            </a>
                        </div>

                        <?php include 'utils/footer.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>