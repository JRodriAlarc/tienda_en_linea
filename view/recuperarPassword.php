<?php
include_once('../utils/alertasRecuperarPassword.php');
require_once('../utils/conSesionActiva.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Password</title>
</head>
<body>

    <h2>Recuperar Contraseña</h2>
    <form action="../controller/procesarRecuperacionPassword.php" method="post">
        <input type="email" name="email" placeholder="Correo Electrónico" required><br>
        <button type="submit">Recuperar Contraseña</button>
    </form>
    <a href="../index.php"><button><--Regresar</button></a>

</body>
</html>