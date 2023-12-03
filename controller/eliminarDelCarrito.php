<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productoId'])) {
        $productoId = $_POST['productoId'];

        // Lógica para eliminar el producto del carrito
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if ($producto['productoId'] === $productoId) {
                unset($_SESSION['carrito'][$key]);
                break;
            }
        }

        // Redireccionar de vuelta a la página del carrito
        header('Location: ../view/carrito.php');
        exit();
    }
}
?>
