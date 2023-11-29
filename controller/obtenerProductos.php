<?php

require_once '../model/obtenerProductosDB.php';
require_once '../model/conexionBD.php';

// Instancia del modelo de productos
$obtenerProductosDB = new obtenerProductosDB($conexion);
// Obtener los productos
$productos = $obtenerProductosDB->obtenerProductosDB();

?>