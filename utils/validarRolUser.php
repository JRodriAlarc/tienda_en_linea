<?php

// Verificar si el usuario no tiene el rol adecuado
if ($_SESSION['usuarioRol'] == 'admin') {
    header("Location: http://localhost/borrador/view/admin/homeAdmin.php"); // Redirigir a la pagina de Adminl si el rol no es el adecuado
    exit();
}
?>