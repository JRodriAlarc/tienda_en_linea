<?php
session_start();

// Lógica para vaciar el carrito
unset($_SESSION['carrito']);

// Redireccionar de vuelta a la página del carrito
header('Location: ../view/carrito.php');
exit();
?>
