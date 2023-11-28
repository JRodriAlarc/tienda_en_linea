<?php

$messages = [
    1 => 'Credenciales incorrectas. Inténtalo de nuevo.',
    'ok' => 'El correo ha sido enviado. Por favor, revisa tu correo electrónico.',
    'error' => "El correo no pudo ser enviado. Error en Nuestro Servidor, Intentelo más tarde.",
    'send_mail' => 'Por favor, revisa tu email. El correo ya ha sido enviado.',
    'new_pass' => 'Contraseña restablecida con éxito. Por favor, inicie sesión.'
];

if (isset($_GET['error']) && isset($messages[$_GET['error']])) {
    echo "<p style='color:red;'>{$messages[$_GET['error']]}</p>";
}

if (isset($_GET['message']) && isset($messages[$_GET['message']])) {
    echo "<p style='color:blue;'>{$messages[$_GET['message']]}</p>";
}

?>