<?php
require_once('utils/conSesionActiva.php');
require_once('utils/alertasLogin.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="utils/img/logo.png">
    <link rel="stylesheet" href="utils/css/paginaLogin.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Iniciar Sesión</title>
</head>
<body>

    <div class="container">
        <img src="utils/img/user.png" alt="Icon">
        <form action="controller/procesarLogin.php" method="POST" class="form">
            
            <h1>Bienvenido</h1>
            <h3>Inicia Sesión</h3>

            <label for="username">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Email:" id="username" name="username" required>
            </label>
        
            <label for="password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Contraseña:" id="password" name="password" required>
            </label>
            
            <a href="view/recuperarPassword.php" class="link">¿Ha Olvidado su Contraseña?</a>
            <a href="view/registro.php" class="link">¿Aun No tiene una Cuenta? ¡Registrese Ya!</a>

            <div class="buttons">
                <button type="submit" id="btn_acept">
                    <span>Aceptar</span>
                    <i class="fa-regular fa-circle-right"></i>
                </button>
            
                <button type="reset" id="btn-cancel" class="btn-cancel">
                    <span>Cancelar</span>
                    <i class="fa-regular fa-circle-xmark"></i>
                </button>
            </div>    

        </form>

    </div>


            
    
</body>
</html>