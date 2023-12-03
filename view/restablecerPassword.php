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
    <title>Restablecer Contraseña mediante Email</title>
</head>
<body>

    <div class="container">
        <form action="../controller/procesarNuevoPassword.php" method="POST" class="form">
            <h2>Restablecer Contraseña usando Email</h2>
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">  <!--Token pasado como parámetro en la URL -->

            <label for="password" style="margin-top: 20px;">
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input type="password" placeholder="Nueva Contraseña" id="password" name="password" required>
            </label>

            <label for="confirm_password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Confirmar Contraseña" id="confirm_password" name="confirm_password" required>
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