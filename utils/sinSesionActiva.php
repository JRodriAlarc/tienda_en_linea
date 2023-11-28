<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['usuarioId'])) {
    header("Location: http://localhost/borrador/"); // Redirigir al formulario de inicio de sesión si no hay sesión activa
    exit();
}
?>