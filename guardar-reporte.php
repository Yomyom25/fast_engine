<?php
require "seguridad.php";
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $actividades = $_POST['actividades'];
    $costo = $_POST['costo'];
    $empleado = $_POST['empleado'];
    $servicio = $_POST['servicio'];
    $cliente = $_POST['cliente'];


    // Prevenir inyección SQL
    $fecha = mysqli_real_escape_string($conectar, $fecha);
    $hora = mysqli_real_escape_string($conectar, $hora);
    $actividades = mysqli_real_escape_string($conectar, $actividades);
    $costo = mysqli_real_escape_string($conectar, $costo);
    $empleado = mysqli_real_escape_string($conectar, $empleado);
    $servicio = mysqli_real_escape_string($conectar, $servicio);
    $cliente = mysqli_real_escape_string($conectar, $cliente);

    // Consulta SQL para insertar el reporte
    $query = "INSERT INTO reportes (Fecha, Hora, Actividades, Costo, Empleados, Servicios, Cliente) 
              VALUES ('$fecha', '$hora', '$actividades', '$costo', '$empleado', '$servicio', '$cliente')";

    if (mysqli_query($conectar, $query)) {
        echo '<script>
                alert("Reporte guardado correctamente!");
                location.href = "reportes.php";
              </script>';
    } else {
        echo '<script>
                alert("Error al guardar el reporte: ' . mysqli_error($conectar) . '");
                history.go(-1);
              </script>';
    }
    mysqli_close($conectar);
} else {
    echo '<script>
            alert("Acceso no autorizado.");
            location.href = "reportes.php";
          </script>';
}
?>
