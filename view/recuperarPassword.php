<?php
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
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Recuperar Contraseña</title>
</head>
<body>
    <div class="form-columns">
    <form action="../controller/procesarRecuperacionPassword.php" method="POST" class="form">
        <h2 style="margin-top: 15px">Recuperar Contraseña usando Email</h2>
        
        <label for="email" class="form-label" style="margin-top: auto; display: block !important;">
            <i class="fa-solid fa-file-signature"></i>
            <input type="email" name="email" id="email" placeholder="Correo Electrónico" required>
        </label>

        <div class="buttons">
            <button id="btn_save" name="recuperar" class="btn_save" type="submit">
                <span>Recuperar Contraseña</span>
                <i class="fa-solid fa-key"></i>
            </button>
        </div>

        <a href="../index.php" class="link" style="margin-top: 10px;">¿Ya Tiene Cuenta? Inicie Sesión</a>
    </form>
    
    <form action="../controller/procesarRecuperacionSMS.php" method="POST" class="form">
        <h2 style="margin-top: 15px">Recuperar Contraseña usando SMS</h2>

        <label for="telefono" class="form-label" style="margin-top: 20px; display: block !important;">
            <i class="fa-solid fa-phone"></i>
            <input type="tel" name="telefono" id="telefono" placeholder="Número de teléfono" required>
        </label>

        <label for="pais" class="form-label" style="margin-top: auto; display: block !important;">
            <i class="fa-solid fa-flag"></i>
            <select name="pais" id="pais" required>
                <option value="">Elige tu País</option>
                <option value="52">MEX 🌮</option>
                <option value="1">USA 🗽</option>
            </select>
        </label>

        <div class="buttons">
            <button id="btn_save" name="recuperar" class="btn_save" type="submit">
                <span>Recuperar Contraseña</span>
                <i class="fa-solid fa-key"></i>
            </button>
        </div>

    </form>
    </div>

</body>
</html>