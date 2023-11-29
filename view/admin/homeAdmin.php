<?php
require_once('../../utils/sinSesionActiva.php');
require_once('../../utils/validarRolAdmin.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <h1>Bienvenido a la página de Administración</h1> 
    <h2><?= $_SESSION['usuarioLogin']; ?></h2>
    <form action="../../controller/cerrarSesion.php" method="POST">
        <input type="submit" value="Cerrar Sesión">
    </form>
    
</body>
</html>