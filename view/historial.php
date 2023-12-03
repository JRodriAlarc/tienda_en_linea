<?php
require_once '../utils/sinSesionActiva.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras</title>
    <link rel="icon" type="image/x-icon" href="../utils/img/logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tu Historial de Compras</h1><br>
                <h2 class="display-7 text-white-50 mb-0">¡Gracias por su Preferencia!</h2>
            </div>
        </div>
    </header>
    <a href="../"><button>Historial</button></a>
    <section class="py-5">
    <div class="container px-4 px-lg-5">
        <?php
        if (!empty($compras)) {
            foreach ($compras as $compra) {
                echo '<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-evenly align-items-center" style="background-color: #ffe0e6;">';
                // Iterar sobre los productos de la compra actual
                foreach ($compra['productos'] as $producto) {
                    echo '<div class="col-12 col-sm-4">';
                    echo '<img src="../utils/img/logo.png" class="img-fluid rounded-start" alt="Producto" width="150">';
                    echo '</div>';
                    echo '<div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $producto['descripcion'] . '</p>';
                    echo '<p class="card-text"><small class="text-body-secondary">Precio: $' . $producto['precio'] . ' MXN</small></p>';
                    echo '</div>';
                    echo '</div>';
                }
                // Enlace para ver o descargar el ticket
                echo '<a href="../utils/tickets/factura_' . $compra['id'] . '.pdf" target="_blank">Ver Ticket</a>';
                echo '</div>';
                echo '<br>';
            }
        } else {
            echo "No hay compras disponibles.";
        }
        ?>
    </div>
</section>
</body>
</html>