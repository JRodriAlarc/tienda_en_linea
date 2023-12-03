<?php
session_start();

// Lógica para vaciar el carrito
unset($_SESSION['carrito']);
?>