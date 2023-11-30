<?php

require_once '../model/conexionBD.php';

// Obtener lista de secciones
$sqlSecciones = "SELECT DISTINCT nombre, codigoSeccion FROM seccion";
$resultadoSecciones = $conexion->query($sqlSecciones);

// Obtener lista de productos
if (isset($_GET['seccion'])) {
    $seccionSeleccionada = $_GET['seccion'];
    $sqlProductos = "SELECT producto.* FROM producto
                     INNER JOIN productoseccion ON producto.codigoProducto = productoseccion.productoCodigoProducto
                     WHERE productoseccion.seccionCodigoSeccion = '$seccionSeleccionada'";
} else {
    $sqlProductos = "SELECT * FROM producto";
}

$resultadoProductos = $conexion->query($sqlProductos);

?>