<?php
include_once('../utils/alertasRecuperarPassword.php');
require_once('../utils/conSesionActiva.php');
#session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../utils/img/logo.png">
    <link rel="stylesheet" href="../utils/css/paginaLogin.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Restablecer Contraseña mediante SMS</title>
</head>
<body>
    
    <div class="container">
        <form action="../controller/procesarNuevoPasswordPhone.php" method="POST" class="form">
            <h2>Restablecer Contraseña usando SMS</h2>
            <input type="hidden" name="codigoVerificacion" value="<?php echo $_SESSION['codigo_verificacion']; ?>">  
            <input type="hidden" name="phone" value="<?php echo $_SESSION['telefonoUsuario']; ?>">

            <label for="password" style="margin-top: 30px;">
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input type="password" name="password" id="password" placeholder="Nueva Contraseña" required>
            </label>

            <label for="confirm_password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required>
            </label>

            <div class="buttons">
                <button id="btn_save" name="recuperar" class="btn_save" type="submit">
                    <span>Restablecer Contraseña</span>
                    <i class="fa-solid fa-key"></i>
                </button>
            </div>
        </form>
    </div>

</body>
</html>