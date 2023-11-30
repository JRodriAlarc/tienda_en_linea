<?php
require_once '../utils/sinSesionActiva.php';
require_once '../utils/obtenerDatosSesion.php';
require_once '../utils/validarRolUser.php';
require_once '../controller/obtenerProductos.php';
require_once '../controller/obtenerSecciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <h1>Bienvenido a la página de inicio</h1>
    <form action="../controller/cerrarSesion.php" method="POST">
        <input type="submit" value="Cerrar Sesión">
    </form>

    <hr>

    <h2>Categorías</h2>
    <ul>
        <?php foreach ($categorias as $categoria): ?>
            <li><?php echo $categoria['nombre']; ?></li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <h2>Productos</h2>
    <div class="productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p><?php echo $producto['descripcion']; ?></p>
                <p>Precio: <?php echo $producto['precioPorUnidad']; ?></p>
            </div><br>
        <?php endforeach; ?>
    </div>

</body>
</html>