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
    <title>Vista de Cliente</title>
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
                            <h1 class="main-titulo">Vista de Cliente</h1>

                            <div class="div-usuario">
                                <div class="vista">
                                    <?php
                                    require "conn.php";

                                    $id_cliente = $_GET["id"];
                                    $query = "SELECT * FROM clientes WHERE ID_cliente = '$id_cliente'";
                                    $resultado = mysqli_query($conectar, $query);
                                    $fila = $resultado->fetch_array();
                                    ?>

                                    <p class='text-bold'>Nombre del Cliente:</p>
                                    <p><?php echo $fila["Nombre_cliente"] . "<hr>"; ?></p>

                                    <p class='text-bold'>Empresa:</p>
                                    <p><?php echo $fila["Empresa"] . "<hr>"; ?></p>

                                    <br>

                                    <p class='text-bold'> Información de contacto:</p>

                                    <p class='text-bold'> <i> Teléfono: </i></p>
                                    <p><i><?php echo $fila["Telefono"]. "<hr>" ; ?></i></p>

                                    <p class='text-bold'> <i>  Correo: </i></p>
                                    <p><i><?php echo $fila["Correo"] . "<hr>"; ?></i></p>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="content1">
                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Editar Cliente</h2>
                                    <a href="editar-cliente.php?id=<?php echo $fila['ID_cliente']; ?>">
                                        <img src="img/edit.png" alt="">
                                    </a>
                                </div>

                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Regresar</h2>
                                    <a href="clientes.php">
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
