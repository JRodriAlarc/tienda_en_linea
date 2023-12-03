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
    <title>Carrito de Compras</title>
</head>
<body>

    <h1>Carrito de Compras</h1>
    <?php

    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        echo '<h2>Productos en el carrito:</h2>';
        echo '<ul>';
        foreach ($_SESSION['carrito'] as $index => $item) {
            $productoId = $item['productoId'];
            $cantidad = $item['cantidad'];
            // Aquí puedes mostrar la información de cada producto en el carrito
            echo "<li>Producto ID: $productoId - Cantidad: $cantidad";
            // Botón para aumentar cantidad
            echo "<form action='../controller/actualizarCantidad.php' method='POST'>";
            echo "<input type='hidden' name='productoId' value='$productoId'>";
            echo "<input type='hidden' name='accion' value='aumentar'>";
            echo "<input type='submit' value='+'></form>";
            // Botón para disminuir cantidad
            echo "<form action='../controller/actualizarCantidad.php' method='POST'>";
            echo "<input type='hidden' name='productoId' value='$productoId'>";
            echo "<input type='hidden' name='accion' value='disminuir'>";
            echo "<input type='submit' value='-'></form>";
            // Botón para eliminar producto del carrito
            echo "<form action='../controller/eliminarDelCarrito.php' method='POST'>";
            echo "<input type='hidden' name='productoId' value='$productoId'>";
            echo "<input type='submit' value='Eliminar'></form>";
            echo "</li>";
        }
        echo '</ul>';

        // Calcular y mostrar el costo total del carrito
        include_once '../controller/costoTotalCarrito.php';
        // Aquí pasamos el valor de $totalCost a una variable JavaScript
        echo '<script>';
        echo 'var totalCost = ' . json_encode($totalCost) . ';'; // Convirtiendo la variable PHP a JavaScript
        echo '</script>';

        // Botón para vaciar el carrito
        echo "<form action='../controller/vaciarCarrito.php' method='POST'>";
        echo "<input type='submit' value='Vaciar Carrito'></form>";

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

    <a href="../"><button><-Regresar</button></a><br>

</body>
</html>