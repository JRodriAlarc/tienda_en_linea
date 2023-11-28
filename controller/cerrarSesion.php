<?php
session_start(); // Iniciar la sesión si no se ha iniciado aún

// Eliminar todas las variables de sesión
$_SESSION = array();

// Si se está utilizando cookies de sesión, también es recomendable borrarlas.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página después de cerrar sesión
header("Location: ../index.php"); // Cambia a la página a la que deseas redirigir después de cerrar sesión
exit();