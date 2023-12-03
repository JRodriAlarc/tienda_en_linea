paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function(data, actions) {
        // Configurar la transacción
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: totalCost
                },
            }]
        });
    },
    onApprove: function(data, actions) {
        // Captura la aprobación del pago
        return actions.order.capture().then(function(details) {
    
            // Vaciar el carrito
            $.ajax({
                type: "POST",
                url: "../controller/completarCompra.php",
                success: function(response) {
                    // Generar el ticket
                    $.ajax({
                        type: "GET",
                        url: "../model/configuracionTicket.php",
                        success: function(pdfData) {
                            // Muestra el ticket generado en una ventana emergente
                            var win = window.open('', '_blank');
                            win.document.write(pdfData);
                            win.focus();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
    
                    // Redirigir al usuario a la página de historial después de 2 segundos
                    setTimeout(function() {
                        window.location.href = "historial.php";
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    },    
    onCancel: function(data) {
        alert("Pago Cancelado");
        console.log(data) //Saber si el usuario Cancelo el Pago;
    },
    onError: function(err) {
        // Lógica si hay algún error durante el pago
        console.error('Error en el pago:', err);
    }
}).render('#paypal-button-container');