<?php

// Verificar si el usuario no tiene el rol adecuado
if ($_SESSION['usuarioRol'] !== 'admin') {
    header("Location: http://localhost/borrador/view/home.php"); // Redirigir a la página principal si el rol no es el adecuado
    exit();
}
?>