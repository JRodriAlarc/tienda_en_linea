<?php
require_once('../utils/conSesionActiva.php');
require_once('../utils/errorRegistro.php')
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Nuevo Usuario</h2>
    <form action="../controller/procesarRegistro.php" method="post">
        <!-- Campos del formulario -->
        <input type="text" name="nif" placeholder="NIF" required><br>
        <input type="email" name="correoElectronico" placeholder="Email" required><br>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="direccion" placeholder="Dirección" required><br>
        <input type="tel" name="telefono" placeholder="Telefono" required><br>
        <input type="text" name="login" placeholder="Login Para Iniciar Sesión" required><br>
        <input type="password" name="userPassword" placeholder="Contraseña" required><br>
        <select name="userRol" id="userRol" required>
            <option value="">Elige una opción</option>
            <option value="admin">Administrador</option>
            <option value="cliente">Cliente</option>
        </select>
        <input type="submit" value="Registrarse">
    </form>
    <a href="../index.php"><button>Regresar <--</button></a>
</body>
</html>