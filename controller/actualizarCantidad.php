<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productoId']) && isset($_POST['accion'])) {
        $productoId = $_POST['productoId'];
        $accion = $_POST['accion'];

        if ($accion === 'aumentar') {
            // Lógica para aumentar la cantidad del producto en el carrito
            foreach ($_SESSION['carrito'] as &$producto) {
                if ($producto['productoId'] === $productoId) {
                    $producto['cantidad']++;
                    break;
                }
            }
        } elseif ($accion === 'disminuir') {
            // Lógica para disminuir la cantidad del producto en el carrito
            foreach ($_SESSION['carrito'] as $key => &$producto) {
                if ($producto['productoId'] === $productoId) {
                    $producto['cantidad']--;
                    if ($producto['cantidad'] <= 0) {
                        unset($_SESSION['carrito'][$key]);
                    }
                    break;
                }
            }
        }

        // Redireccionar de vuelta a la página del carrito
        header('Location: ../view/carrito.php');
        exit();
    }
}
?>
