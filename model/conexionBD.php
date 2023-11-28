<?php

$servidor = "localhost";
$usuarioBD = "root";
$contrasenaBD = "";
$nombreBD = "borrador";

// Crear conexión
$conexion = new mysqli($servidor, $usuarioBD, $contrasenaBD, $nombreBD);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>