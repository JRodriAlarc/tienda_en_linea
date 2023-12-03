<?php

$messages = [
    1 => 'Credenciales incorrectas. Inténtalo de nuevo.',
    'ok' => 'El correo ha sido enviado. Por favor, revisa tu correo electrónico.',
    'error' => "El correo no pudo ser enviado. Error en Nuestro Servidor, Intentelo más tarde.",
    'send_mail' => 'Por favor, revisa tu email. El correo ya ha sido enviado.',
    'new_pass' => 'Contraseña restablecida con éxito. Por favor, inicie sesión.',
    'send_code' => 'Mensaje Enviado, Ingrese el código de Verificación'
];

if (isset($_GET['error']) && isset($messages[$_GET['error']])) {
    #echo "<p style='color:red;'>{$messages[$_GET['error']]}</p>";

    echo "<div id='errorDiv' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffe5e5; color: #ff0000; padding: 20px; border-radius: 15px; border: 1px solid #ff0000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 9999;'>
        <span onclick='cerrarAlerta()' style='cursor: pointer; position: absolute; top: 5px; right: 10px; font-weight: bold;'>x</span>
        {$messages[$_GET['error']]}
      </div>";

    echo "<script>
        function cerrarAlerta() {
          const errorDiv = document.getElementById('errorDiv');
          errorDiv.style.display = 'none';
        }
      </script>";
}

if (isset($_GET['message']) && isset($messages[$_GET['message']])) {
    #echo "<p style='color:blue;'>{$messages[$_GET['message']]}</p>";
    
    echo "<div id='successDiv' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #cce5ff; color: #007bff; padding: 20px; border-radius: 10px; border: 1px solid #007bff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 9999;'>
        <span onclick='cerrarSuccess()' style='cursor: pointer; position: absolute; top: 5px; right: 10px; font-weight: bold;'>x</span>
        {$messages[$_GET['message']]}
      </div>";

    echo "<script>
        function cerrarSuccess() {
          const successDiv = document.getElementById('successDiv');
          successDiv.style.display = 'none';
        }
      </script>";
}

?>