<?php
include_once('../utils/alertasRecuperarPassword.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña mediante SMS</title>
</head>
<body>
    
    <h2>Restablecer Contraseña usando SMS</h2>
    <form action="../controller/procesarNuevoPasswordPhone.php" method="post">
        <input type="hidden" name="codigoVerificacion" value="<?php echo $_SESSION['codigo_verificacion']; ?>">  
        <input type="hidden" name="phone" value="<?php echo $_SESSION['telefonoUsuario']; ?>">
        <input type="password" name="password" placeholder="Nueva Contraseña" required><br>
        <input type="password" name="confirm_password" placeholder="Confirmar Contraseña" required><br>
        <button type="submit">Restablecer Contraseña</button>
    </form>

</body>
</html>