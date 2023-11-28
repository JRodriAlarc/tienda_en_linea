<?php
require_once('utils/conSesionActiva.php');
require_once('utils/alertasLogin.php');
?>

<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="controller/procesarLogin.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <a href="view/registro.php"><button>Registrar Usuarios</button></a><br>
    <a href="view/recuperarPassword.php">Recuperar Contraseña</a>
</body>
</html>