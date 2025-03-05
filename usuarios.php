<?php
include 'seguridad.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-principal.css">
    <link rel="stylesheet" type="text/css" href="css/style-usuario.css">

    <title>Usuarios</title>
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
                            <h1 class="main-titulo">Usuarios</h1>
                            <div class="div-usuarios">
                                <!-- Tabla de usuarios -->
                                <table class="tabla-usuarios">
                                    <tr>
                                        <th class="font-yellow">ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th class="font-yellow">Ver</th>
                                        <th class="font-yellow">Editar</th>
                                        <th class="font-yello">Borrar</th>
                                    </tr>
                                    <?php
                                    require "conn.php";

                                    $todos = "SELECT * FROM usuarios ORDER BY ID_usuario ASC";
                                    $resultado = mysqli_query($conectar, $todos);
                                    while ($fila = $resultado->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila["ID_usuario"] ?></td>
                                            <td><?php echo $fila["nombre"] ?></td>
                                            <td><?php echo $fila["apellido"] ?></td>
                                            <td><?php echo $fila["email"] ?></td>
                                            <td><a href="ver-usuario.php?id=<?php echo $fila["ID_usuario"]; ?>"><img class="img-tabla" src="img/see.png" alt=""></a></td>
                                            <td><a href="editar-usuario.php?id=<?php echo $fila["ID_usuario"]; ?> "><img class="img-tabla" src="img/edit.png" alt=""></a></td>
                                            <td><a href="#" onClick="validarDelete('eliminar.php?id=<?php echo $fila["ID_usuario"]; ?>')"><img class="img-tabla" src="img/delete.png" alt=""></a></td>
                                        </tr>
                                    <?php } ?>

                                </table>

                            </div>
                        </div>
                        <div class="content2">
                            <h2 class="main-subtitulo">Agregar usuario</h2>
                            <div class="div-add">
                                <a class="add-user" href="agregar-usuario.php">
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
        var mensaje = confirm("¿Está seguro de eliminar este usuario?");
        if (mensaje == true) {
            window.location = url;
        }
    }
</script>

</html>