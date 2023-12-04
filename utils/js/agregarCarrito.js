$(document).ready(function() {
    // Escuchar clics en el botón "Agregar al carrito"
    $('.agregar-carrito').click(function() {
        event.preventDefault(); // Evitar que el formulario se envíe por defecto

        var form = $(this).closest('form'); // Obtener el formulario más cercano al botón clickeado
        var productoId = $(this).data('producto-id');
        var cantidad = 1;
        var productoNombre = form.find('h3').data('producto-name');
        var productoPrecio = form.find('p[data-producto-precio]').data('producto-precio');
        var productoImagen = form.find('img').attr('src'); // Obtener el atributo 'src' de la imagen

        // Realizar una solicitud AJAX al servidor para agregar el producto al carrito
        $.ajax({
            type: 'POST',
            url: '../controller/agregarCarrito.php', // Reemplaza con la URL correcta
            data: { 
                productoId: productoId,
                cantidad: cantidad,
                productoNombre: productoNombre,
                productoPrecio: productoPrecio,
                productoImagen: productoImagen
            }, // Enviar el ID del producto al servidor
            success: function() {
                alert('Producto agregado al carrito'); // Mostrar mensaje de éxito
            },
            error: function() {
                alert('Error al agregar el producto al carrito');
            }
        });
    });
});