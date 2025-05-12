<?php 
session_start();
if ($_SESSION ["autentificado"] != "SI") {
    header ("Location: index.php");
    }  else {

$nombre_cookie = "tiempo_inicio";
$tiempo_expiracion = 10000;

setcookie($nombre_cookie, time(), time() + $tiempo_expiracion, "/");
function verificarTiempoCookie ($nombre_cookie, $tiempo_expiracion)
{
    if (isset($_COOKIE[$nombre_cookie])) {
        if (time() - $_COOKIE[$nombre_cookie] > $tiempo_expiracion) {

            //BORAR DATOS
            setcookie($nombre_cookie, '', time() - $tiempo_expiracion, '/');
            session_unset();
            session_destroy();
            //REDIRECCIONAR A LOGIN
            header("Location: index.php");
            exit();
        } else {
            echo "la cookie valida . <br>";

        }
    } else {
        session_unset();
        session_destroy();
        //REDIRECCIONAR A LOGIN
        header("Location: index.php");
        exit();
    }
}

verificarTiempoCookie($nombre_cookie, $tiempo_expiracion);

}
?>