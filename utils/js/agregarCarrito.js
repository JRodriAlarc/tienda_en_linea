$(document).ready(function() {
    // Escuchar clics en el botón "Agregar al carrito"
    $('.agregar-carrito').click(function() {
        var productoId = $(this).data('producto-id');
        var cantidad = 1;

        // Realizar una solicitud AJAX al servidor para agregar el producto al carrito
        $.ajax({
            type: 'POST',
            url: '../controller/agregarCarrito.php', // Reemplaza con la URL correcta
            data: { 
                productoId: productoId,
                cantidad: cantidad,
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