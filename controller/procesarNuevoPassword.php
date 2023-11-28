<?php
require_once '../model/conexionBD.php';
require_once '../model/comprobarEmailRestablecerPassword.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['token'])) {
        $token = $_POST['token']; // Obtiene el token desde la URL
    } else {
        // Manejar la ausencia del parámetro 'token' en la URL
        header("Location: ../view/restablecerPassword.php?token=$token&error=unknown_token");
        exit();
    }
    
    // Obtener los campos del formulario
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Validar los campos del formulario
    if (!empty($password) || !empty($confirmPassword)) {
        if (strlen($password) >= 8) {
            if ($password === $confirmPassword) {
                // Actualiza la contraseña en la base de datos asociada al token
                $comprobarEmail = new comprobarEmailRestablecerPassword($conexion);
                $comprobarEmail->actualizarPasswordConToken($token, $password);
                
                // Redirige al usuario a la página de confirmación o inicio de sesión
                header("Location: ../index.php?message=new_pass");
                exit();
            } else {
                #echo 'Las contraseñas no coinciden';
                header("Location: ../view/restablecerPassword.php?token=$token&error=bad_pass");
                exit();
            }
        } else {
            // La contraseña es demasiado corta (menos de 8 caracteres)
            header("Location: ../view/restablecerPassword.php?token=$token&error=password_corto");
            exit();
        }
    } else {
        // Algunos campos están vacíos
        header("Location: ../view/restablecerPassword.php?token=$token&error=campos_vacios");
        exit();
    }
}

?>