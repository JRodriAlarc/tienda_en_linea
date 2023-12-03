<?php
include_once('../utils/alertasLogin.php');
include_once('../utils/alertasRecuperarPassword.php');
require_once('../utils/conSesionActiva.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../utils/img/logo.png">
    <link rel="stylesheet" href="../utils/css/paginaLogin.css">
    <link rel="stylesheet" href="../utils/css/recuperarPassword.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Código de Verificación</title>
</head>
<body>

    <div class="container">
        <form action="../controller/validarCodigoVerificacion.php" method="POST" id="verificationForm" class="form">
            <h2>Recuperar Contraseña usando SMS</h2>
            <div id="verificationCode" name="verificationCode">
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit1" id="digit1" required>
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit2" id="digit2" required>
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit3" id="digit3" required>
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit4" id="digit4" required>
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit5" id="digit5" required>
                <input type="text" maxlength="1" pattern="\d" inputmode="numeric" name="digit6" id="digit6" required>
            </div>
            <div class="buttons">
                <button id="btn_save" name="recuperar" class="btn_save" type="submit">
                    <span>Recuperar Contraseña </span>
                    <i class="fa-solid fa-unlock-keyhole"></i>
                </button>
            </div>
        </form>
    </div>
    
    <script src="../utils/js/recuperarPassword.js"></script>
</body>
</html>