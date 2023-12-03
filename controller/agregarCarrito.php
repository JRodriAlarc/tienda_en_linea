<?php
include_once '../model/conexionBD.php';
session_start();

// Aquí debes manejar la lógica para agregar el producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productoId'])) {
    $productoId = $_POST['productoId'];
    $cantidad = $_POST['cantidad'];

    // Verificar si existe un carrito para el usuario actual en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = []; // Si no existe, crear un carrito vacío
    }

    // Insertar el producto en la tabla 'detallecarrito'
    $_SESSION['carrito'][] = ['productoId' => $productoId, 'cantidad' => $cantidad];

    // Insertar el producto en la tabla detallecarrito (adaptar a tu lógica de BD)
    $fechaCreacion = date('Y-m-d'); // Obtener la fecha actual
    $usuarioNIF = $_SESSION['usuarioNIF']; // Obtener el NIF del usuario desde la sesión

    function obtenerPrecioProducto($conexion, $productoId) {
        // Lógica para obtener el precio del producto desde la BD
        $query = "SELECT precioPorUnidad FROM producto WHERE codigoProducto = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $productoId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['precioPorUnidad'];
    }

    // Realizar la inserción en la tabla detallecarrito
    $query = "INSERT INTO detallecarrito (codigoProducto, cantidad, precioTotal, carritoFechaCreacion) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $precioTotal = obtenerPrecioProducto($conexion, $productoId) * $cantidad; // Obtener precio del producto
    $stmt->bind_param("siis", $productoId, $cantidad, $precioTotal, $fechaCreacion);
    $stmt->execute();

    // Si se ha agregado correctamente, puedes devolver un mensaje de éxito
    echo 'Producto agregado al carrito exitosamente';
} else {
    echo 'Error al procesar la solicitud';
}

?>
