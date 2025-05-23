<?php
$host = "localhost";
$user = "jyanmx_yom";
$contrasena = "g_8!yu(,8(R3";
$bd = "jyanmx_taller_yomara";

$conectar = mysqli_connect($host, $user, $contrasena, $bd);

if (!$conectar) {
	echo "No se pudo conectar a la base de datos";
}
