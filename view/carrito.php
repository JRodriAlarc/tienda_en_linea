<?php
include_once '../utils/sinSesionActiva.php';
require_once "../model/configs.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../utils/img/logo.png" />
    <link rel="stylesheet" href="../utils/css/paginaCarrito.css">
    <script src="https://kit.fontawesome.com/8a7c80030f.js" crossorigin="anonymous"></script>
    <title>Carrito de Compras</title>
</head>
<body>

    <header class="navbar">
        <h1>Carrito de Compras</h1>
    </header>

    <section class="productos-carrito">
        <div class="container">
            <?php
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                echo '<h2>Productos en el carrito:</h2>';
                echo '<ul class="form">';
                foreach ($_SESSION['carrito'] as $index => $item) {
                    $productoId = $item['productoId'];
                    $productoNombre = $item['productoNombre'];
                    $productoPrecio = $item['productoPrecio'];
                    $cantidad = $item['cantidad'];
                    $productoImagen = $item['productoImagen'];
                    // Aquí puedes mostrar la información de cada producto en el carrito
                    echo "<li><b>Producto: Cantidad: Precio:</b> <br>";
                    echo '<div class="productos-carrito">';
                    echo '<img class="card-img-bottom" src="'.$productoImagen.'" alt="Producto ' . $productoId . '"/>';
                    echo "$productoNombre";
                    // Botón para aumentar cantidad
                    echo "<form action='../controller/actualizarCantidad.php' method='POST'>";
                    echo "<input type='hidden' name='productoId' value='$productoId'>";
                    echo "<input type='hidden' name='accion' value='aumentar'>";
                    echo "<input type='submit' value='+'></form>";
                    echo "$cantidad";
                    // Botón para disminuir cantidad
                    echo "<form action='../controller/actualizarCantidad.php' method='POST'>";
                    echo "<input type='hidden' name='productoId' value='$productoId'>";
                    echo "<input type='hidden' name='accion' value='disminuir'>";
                    echo "<input type='submit' value='-'></form>";

                    echo "$$productoPrecio";
                    // Botón para eliminar producto del carrito
                    echo "<form action='../controller/eliminarDelCarrito.php' method='POST'>";
                    echo "<input type='hidden' name='productoId' value='$productoId'>";
                    echo "<button class='btn-drop' type='submit'><i class='fa-solid fa-trash-can'></i></button>";
                    echo '</div>';
                    echo "</form>";
                    echo "</li>";
                }
                echo '</ul>';

                echo '<div class="resumen-products">';
                // Calcular y mostrar el costo total del carrito
                include_once '../controller/costoTotalCarrito.php';
                // Aquí pasamos el valor de $totalCost a una variable JavaScript
                echo '<script>';
                echo 'var totalCost = ' . json_encode($totalCost) . ';'; // Convirtiendo la variable PHP a JavaScript
                echo '</script>';

                // Botón para vaciar el carrito
                echo "<form action='../controller/vaciarCarrito.php' method='POST'>";
                echo "<input class='vaciar-carrito' type='submit' value='Vaciar Carrito'></form>";
                echo '</div>';

                ?>
                <div id='paypal-button-container'></div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID; ?>&locale=<?php echo PAYPAL_PAIS; ?>&currency=<?php echo PAYPAL_MONEDA; ?>"></script>

                <script src="../utils/js/pagarConPayPal.js"></script>
                <?php

                
            } else {
                echo '<p>No hay productos en el carrito</p>';
            }

            ?>
        </div>
    </section>
    <div class="buttons">
        <a href="../">
            <button type="button" id="btn-cancel" class="btn-cancel">
                <span>Atras</span>
                <i class="fa-regular fa-circle-left"></i>
            </button>
        </a>
    </div>

</body>
</html>