<?php
// Array asociativo con los mensajes de error
$messages = [
    'error_mail' => 'Verifique sus Datos. No se encontró ningún usuario con ese correo electrónico.',
    'bad_pass' => 'Las contraseñas no coinciden. Verifique sus datos.',
    'bad_mail' => 'El correo no pudo ser enviado. Error en Nuestro Servidor, Intentelo más tarde.',
    'unknown_token' => 'Error: Falta el parámetro Token en la URL. Vaya a su Email.',
    'token_not_updated' => 'No se pudo actualizar el token. Intente nuevamente.',
    'password_corto' => 'La contraseña es demasiado corta (Al menos de 8 caracteres).',
    'campos_vacios' => 'Algunos campos están vacíos.',
    'invalid_email' => 'Verifique el formato de su Correo Electrónico',
    'tel' => 'El formato del teléfono es incorrecto',
    'error_tel' => 'Verifique sus Datos. No se encontró ningún usuario con ese telefono',
    'bad_sms' => 'El SMS no pudo ser enviado. Error en Nuestro Servidor, Intentelo más tarde',
    'invalid_code' => 'El Código de Verificación es Incorrecto',
    'code_unknown' => 'No hay código de verificación en la Sesión',
    'code_null' => 'El código para recuperar su contraseña ha Expirado'
];

/*
// Función para mostrar mensajes de error
function mostrarError($error) {
    global $messages;
    if (isset($messages[$error])) {
        echo "<p style='color:red;'>{$messages[$error]}</p>";
    }
}

// Mostrar los mensajes de error según los parámetros recibidos
if (isset($_GET['message'])) {
    mostrarError($_GET['message']);
}

if (isset($_GET['error'])) {
    mostrarError($_GET['error']);
}
*/

// Función para mostrar mensajes de error
function mostrarError($error) {
    global $messages;
    if (isset($messages[$error])) {
        echo "<div id='errorDiv' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffe5e5; color: #ff0000; padding: 20px; border-radius: 15px; border: 1px solid #ff0000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 9999;'>
            <span onclick='cerrarAlerta()' style='cursor: pointer; position: absolute; top: 5px; right: 10px; font-weight: bold;'>x</span>
            {$messages[$error]}
        </div>";
    }
}

// Mostrar los mensajes de error según los parámetros recibidos
if (isset($_GET['message'])) {
    mostrarError($_GET['message']);
}

if (isset($_GET['error'])) {
    mostrarError($_GET['error']);
}

echo "<script>
    function cerrarAlerta() {
        const errorDiv = document.getElementById('errorDiv');
        errorDiv.style.display = 'none';
    }
</script>";


?>