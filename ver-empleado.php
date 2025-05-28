<?php 
include 'seguridad.php';
require "conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM empleados WHERE ID_empleado = ?";
    $stmt = $conectar->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $empleado = $resultado->fetch_assoc();
    } else {
        echo "Empleado no encontrado.";
        exit();
    }
} else {
    echo "ID de empleado no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style-principal.css" />
    <link rel="stylesheet" href="css/style-usuario.css" />
    <link rel="stylesheet" href="css/style-empleado.css" />
    <title>Detalles del Empleado</title>
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
                            <h1 class="main-titulo">Detalles del Empleado</h1>

                            <div class="div-usuario">
                                <div class="vista">
                                    <p class="text-bold">ID:</p>
                                    <p><?php echo $empleado["ID_empleado"]; ?><hr></p>

                                    <p class="text-bold">Nombre:</p>
                                    <p><?php echo $empleado["Nombre_empleado"]; ?><hr></p>

                                    <p class="text-bold">Apellido:</p>
                                    <p><?php echo $empleado["Apellido_empleado"]; ?><hr></p>

                                    <p class="text-bold">Fecha de Nacimiento:</p>
                                    <p><?php echo $empleado["FechaNacimiento"]; ?><hr></p>

                                    <p class="text-bold">Sexo:</p>
                                    <p>
                                        <?php 
                                            echo ($empleado["Sexo"] === "M") ? "Masculino" : "Femenino"; 
                                        ?>
                                        <hr>
                                    </p>

                                    <!-- Foto del empleado corregida -->
                                    <?php if(!empty($empleado['ruta_foto'])): ?>
                                        <p class="text-bold">Foto:</p>
                                        <img src="<?php echo $empleado['ruta_foto']; ?>" alt="Foto del empleado" style="max-width: 250px; height: auto; margin-bottom: 20px;">
                                    <?php else: ?>
                                        <p class="text-bold">Foto:</p>
                                        <p>No hay foto disponible</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="content1">
                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Editar Empleado</h2>
                                    <a href="editar-empleado.php?id=<?php echo $empleado['ID_empleado']; ?>">
                                        <img src="img/edit.png" alt="Editar" />
                                    </a>
                                </div>

                                <div class="btn icon">
                                    <h2 class="main-subtitulo">Regresar</h2>
                                    <a href="empleados.php">
                                        <img src="img/back.png" alt="Regresar" />
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