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

?>