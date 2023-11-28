<?php
include_once('../utils/alertasRecuperarPassword.php');
require_once('../utils/conSesionActiva.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>
<body>

    <form action="../controller/procesarNuevoPassword.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">  <!--Token pasado como parámetro en la URL -->
        <input type="password" name="password" placeholder="Nueva Contraseña" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required><br>
        <button type="submit">Restablecer Contraseña</button>
    </form>
</body>
</html>