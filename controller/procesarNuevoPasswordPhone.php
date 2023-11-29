<?php
session_start();

require_once('../model/conexionBD.php');
require_once('actualizarPasswordSMS.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['codigoVerificacion'])) {
        $codigo = $_POST['codigoVerificacion']; // Obtiene el Codigo de verificación
        $telefonoRecuperacion = $_POST['phone'];
    } else {
        // Manejar la ausencia del parámetro 'CodigoVerificacion'
        header("Location: ../view/restablecerPasswordPhone.php?error=code_null");
        exit();
    }

    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validar los campos del formulario
    if (!empty($newPassword) || !empty($confirmPassword)) {
        if (strlen($newPassword) >= 8) {
            if ($newPassword === $confirmPassword) {
                // Actualiza la contraseña en la base de datos asociada al Codigo de verificación
                $cambiarPassword = new actualizarPasswordConSMS($conexion);
                $cambiarPassword->actualizarPasswordConSMS($telefonoRecuperacion, $newPassword);
        
                // Redirigir al usuario a la página de inicio.
                header("Location: ../index.php?message=new_pass");
                exit();
            } else {
                // Las contraseñas no coinciden
                header("Location: ../view/restablecerPasswordPhone.php?message=bad_pass");
                exit();
            }
        } else {
            // La contraseña es demasiado corta (menos de 8 caracteres)
            header("Location: ../view/restablecerPasswordPhone.php?error=password_corto");
            exit();
        }
    } else {
        // Algunos campos están vacíos
        header("Location: ../view/restablecerPasswordPhone.php?error=campos_vacios");
        exit();
    }

}
?>
