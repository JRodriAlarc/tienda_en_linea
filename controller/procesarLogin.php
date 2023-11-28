<?php

require_once('../model/conexionBD.php'); 
require_once('../model/verificarCredenciales.php');
require_once('iniciarSesion.php');

$verificarCredenciales = new verificarCredenciales($conexion);
$iniciarSesion = new iniciarSesion($verificarCredenciales);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $iniciarSesion->iniciarSesion($username, $password);
}

?>