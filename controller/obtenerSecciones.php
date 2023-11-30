<?php

require_once '../model/obtenerSeccionDB.php';
require_once '../model/conexionBD.php';

// Instancia del modelo de productos
$obtenerSeccionDB = new obtenerSeccionDB($conexion);
// Obtén los productos por categoría
$categorias = $obtenerSeccionDB->obtenerSeccionDB();

?>