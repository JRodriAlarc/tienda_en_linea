<?php

class iniciarSesion {
    private $iniciarSesion;

    public function __construct($iniciarSesion) {
        $this->iniciarSesion = $iniciarSesion;
    }

    public function iniciarSesion($username, $password) {
        // Verificar credenciales
        $usuario = $this->iniciarSesion->verificarCredenciales($username, $password);

        if ($usuario) {
            // Iniciar sesión
            session_start(); // Iniciar sesión aquí
            $_SESSION['usuarioId'] = $usuario['nif'];
            $_SESSION['usuarioEmail'] = $usuario['correoElectronico'];
            $_SESSION['usuarioLogin'] = $usuario['login'];
            $_SESSION['usuarioRol'] = $usuario['rol'];
            #print_r($usuario);
            
            // Validar el rol del usuario
            if ($_SESSION['usuarioRol'] == 'admin'){
                header("Location: ../view/admin/homeAdmin.php"); // Redirigir al área de Administración si es Admin
                exit();
            } else{
                // Redirigir a la página de inicio después del inicio de sesión exitoso
                header("Location: ../view/home.php");
                exit();
            }
            
        } else {
            // Redirigir de vuelta a la página de inicio de sesión con un mensaje de error
            header("Location: ../index.php?error=1");
            exit();
        }
    }
}

?>