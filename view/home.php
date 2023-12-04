<?php
require_once '../utils/sinSesionActiva.php';
#require_once '../utils/obtenerDatosSesion.php';
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
    <link rel="shortcut icon" href="../utils/img/logo.png">
    <link rel="stylesheet" href="../utils/css/paginaHome.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

    <div class="container">
        <header class="navbar">
            <h1>CompraFácilYa</h1>
            <section class="seccionSecciones">
                <div class="secciones">
                    <ul class="categorias">
                        <li><a href="home.php">Todo</a></li>
                        <?php
                        if ($resultadoSecciones->num_rows > 0) {
                            while ($row = $resultadoSecciones->fetch_assoc()) {
                                echo '<li><a href="home.php?seccion=' . $row['codigoSeccion'] . '">' . $row['nombre'] . '</a></li>';
                            }
                        } else {
                            echo "<li>No hay secciones disponibles.</li>";
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <div class="nav-buttons">
                <a href="carrito.php" class="nav-button">Carrito
                    <i class="fa-solid fa-cart-arrow-down"></i>
                </a>
                <a href="historial.php" class="nav-button">Historial</a>
            </div>
            <form action="../controller/cerrarSesion.php" method="POST">
                <input type="submit" class="nav-button" value="Cerrar Sesión">
            </form>
            <div class="cliente">
                <p><?= $_SESSION['usuarioLogin']; ?></p>
            </div>
        </header>
        
        <div class="contenedor-titulo">
            <div class="titulo">
                <h2>Productos</h2>
            </div>
        </div>
        
        <section class="seccionProductos">
            <div class="productos">
                <?php
                if ($resultadoProductos->num_rows > 0) {
                    while ($row = $resultadoProductos->fetch_assoc()) {
                        echo '<form id="formulario" name="formulario" method="POST" action="carrito.php">';
                        echo '<div>';
                        echo '<h3 data-producto-name="'.$row['nombre'].'">' . $row['nombre'] . '</h3>';
                        echo '<img class="card-img-top" src="../utils/img/products/'.$row['imagen'] . '" alt="Producto ' . $row['codigoProducto'] . '" data-producto-image="' . $row['imagen'] . '"/>';
                        echo '<p>' . $row['descripcion'] . '</p>';
                        echo '<p data-producto-precio="'.$row['precioPorUnidad'].'">Precio: $ <b>' . $row['precioPorUnidad'] . '</b></p>';
                        echo '<button class="agregar-carrito" type="submit" data-producto-id="'.$row['codigoProducto'].'">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>';
                        echo '</div>';
                        echo '</form>';
                    }
                } else {
                    echo "No hay productos disponibles en esta sección.";
                }
                ?>
            </div>
            <img src="../utils/img/DEP002.png" alt="">
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../utils/js/agregarCarrito.js"></script>
    
</body>
</html>