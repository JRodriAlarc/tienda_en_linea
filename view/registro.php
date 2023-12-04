<?php
require_once('../utils/conSesionActiva.php');
require_once('../utils/errorRegistro.php')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../utils/img/logo.png" />
    <link rel="stylesheet" href="../utils/css/paginaLogin.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Registro de Usuario</title>
</head>
<body>

    <div class="container">
        <form action="../controller/procesarRegistro.php" method="POST" class="form">

            <h1 style="margin-top: 25px;">Bienvenido</h1>
            <h3>Completa tu Información Personal:</h3>
            
            <div class="form-columns">
                <label for="nif" class="form-label">
                    <i class="fa-solid fa-address-card"></i>
                    <input type="text" name="nif" id="nif" placeholder="NIF" required>
                </label>

                <label for="correoElectronico" class="form-label">
                    <i class="fa-solid fa-file-signature"></i>
                    <input type="email" name="correoElectronico" id="correoElectronico" placeholder="Email" required>
                </label>

                <label for="nombre" class="form-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                </label>

                <label for="direccion" class="form-label">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                </label>

                <label for="telefono" class="form-label">
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" name="telefono" id="telefono" placeholder="Telefono" required>
                </label>

                <label for="login" class="form-label">
                    <i class="fa-solid fa-user-check"></i>
                    <input type="text" name="login" id="login" placeholder="Nombre de Usuario" required>
                </label>

                <label for="userPassword" class="form-label">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="userPassword" id="userPassword" placeholder="Contraseña" required>
                </label>

                <label for="userRol" class="form-label">
                    <i class="fa-solid fa-ticket"></i>
                    <select name="userRol" id="userRol" required>
                        <option value="">Elige una opción</option>
                        <option value="admin">Administrador</option>
                        <option value="cliente">Cliente</option>
                    </select>
                </label>
            </div>

            <div class="buttons">
                <button id="btn_save" name="registrar" class="btn_save" type="submit">
                    <span>Registrarse</span>
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </button>
            </div>

            <a href="../index.php" class="link">¿Ya Tienes Cuenta? Inicia Sesión</a>
        </form>
    </div>

</body>
</html>