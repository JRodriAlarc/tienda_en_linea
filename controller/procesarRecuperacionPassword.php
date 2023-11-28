<?php
require_once '../model/comprobarEmailRestablecerPassword.php';
require_once '../model/conexionBD.php';
require_once '../model/actualizarToken.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    // Validar el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // El formato del correo electrónico es incorrecto
        header("Location: ../view/recuperarPassword.php?error=invalid_email");
        exit();
    }

    $comprobarEmail = new comprobarEmailRestablecerPassword($conexion);
    $usuario = $comprobarEmail->comprobarEmailRestablecerPassword($email);

    // Genera un token único de 64 caracteres hexadecimales (32 bytes)
    $token = bin2hex(random_bytes(32)); 

    // Genera un token único de 64 caracteres hexadecimales (32 bytes)
    function generateToken() {
        return bin2hex(random_bytes(32)); 
    }

    if ($usuario) {
        try {
            // Genera un token único para esta solicitud
            $token = generateToken(); 

            // Almacena el token en la base de datos asociado al usuario
            $actualizarToken = new actualizarToken($conexion);
            $actualizarToken->almacenarToken($usuario['nif'], $token);

            // Si se actualizó el token con éxito
            // Envia el correo al usuario con el enlace que contiene el token para restablecer la contraseña
            require_once '../model/configuracionCorreoRecuperacion.php';
            
        } catch (Exception $e) {
            // No se actualizó ningún registro
            header("Location: ../view/recuperarPassword.php?error=token_not_updated");
            exit();
        }
    } else {
        #echo 'No se encontró ningún usuario con ese correo electrónico';
        header("Location: ../view/recuperarPassword.php?message=error_mail");
        exit();
    }
}

?>