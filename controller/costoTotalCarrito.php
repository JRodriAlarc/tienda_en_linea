<?php
include_once '../model/conexionBD.php';

$totalCost = 0;

foreach ($_SESSION['carrito'] as $producto) {
    $productoId = $producto['productoId'];
    // Realiza una consulta para obtener el precio del producto con ID $productoId desde la base de datos
    $query = "SELECT precioPorunidad FROM producto WHERE codigoProducto = '$productoId'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $precioProducto = $row['precioPorunidad'];
        $totalCost += $precioProducto * $producto['cantidad'];
    }
}

echo "<b>Costo total del carrito:</b> $" . number_format($totalCost, 2); // Muestra el costo total formateado
?>
