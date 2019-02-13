<?php
include '../../modelo/baseDatos.php';

/**
 * Direccionamiento del login
 *
 * @param $url
 */
function redi($extra, $url) {
    header('location: ' . $extra . $url);
}

if(isset($_GET['Apodo']) && isset($_GET['Contrasenia'])) {
    $apodo = $_GET['Apodo'];
    $pass = $_GET['Contrasenia'];

    $passMd5 = md5($pass);

    $bd = new baseDatos();
    $direccion = $bd->checkUser($apodo,$pass);

    redi("../html/", $direccion);
}