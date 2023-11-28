<?php

session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuarioId'])) {
    header("Location: http://localhost/borrador/view/home.php"); // Redirigir al área de inicio si ya ha iniciado sesión
    exit();
}

?>