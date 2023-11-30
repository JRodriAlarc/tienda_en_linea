<?php
require_once '../utils/sinSesionActiva.php';
require_once '../utils/obtenerDatosSesion.php';
require_once '../utils/validarRolUser.php';
#require_once '../controller/obtenerProductos.php';
#require_once '../controller/obtenerSecciones.php';
require_once '../controller/filtrarProductosPorSeccion.php';
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

    <div>
        <h2>Secciones</h2>
        <ul>
            <li><a href="home.php">Todo</a></li>
        </ul>
        <?php
        if ($resultadoSecciones->num_rows > 0) {
            echo '<ul>';
            while ($row = $resultadoSecciones->fetch_assoc()) {
                echo '<li><a href="home.php?seccion=' . $row['codigoSeccion'] . '">' . $row['nombre'] . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo "No hay secciones disponibles.";
        }
        ?>
    </div>

    <div>
        <h2>Productos</h2>
        <?php
        if ($resultadoProductos->num_rows > 0) {
            while ($row = $resultadoProductos->fetch_assoc()) {
                echo '<div>';
                echo '<h3>' . $row['nombre'] . '</h3>';
                echo '<p>' . $row['descripcion'] . '</p>';
                echo '<p>Precio: ' . $row['precioPorUnidad'] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No hay productos disponibles en esta sección.";
        }
        ?>
    </div>
    
</body>
</html>