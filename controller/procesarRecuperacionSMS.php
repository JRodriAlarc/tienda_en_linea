<?php

require_once '../model/conexionBD.php';
require_once '../model/comprobarSMSRestablecerPassword.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $telefono = $_POST['telefono'];
    $pais = $_POST['pais'];
    //Al número se le debe agregar la Lada, Para USA agregar 1 al inicio, para Mexico 52
    $number = $pais.$telefono;
    

    if (!empty($telefono) && !empty($pais)){
        // Verificar que el teléfono tenga 10 dígitos numéricos
        if (!preg_match("/^[0-9]{10}$/", $telefono)) {
            // El formato del teléfono es incorrecto
            header("Location: ../view/recuperarPassword.php?error=tel");
            exit();
        }

        //Comprobar que el Telefono esta almacenado en la base de datos
        $comprobarSMS = new comprobarSMSActualizarPassword($conexion);
        $usuario = $comprobarSMS->comprobarSMSActualizarPassword($telefono);

        // Función para generar un código aleatorio
        function generarCodigo() {
            // Lógica para generar un código único (puedes personalizar según tus necesidades)
            return substr(str_shuffle("0123456789"), 0, 6); // Código de 6 dígitos
        }

        if ($usuario) {
            // Función para generar un código de verificación único
            $codigoVerificacion = generarCodigo(); 

            // Almacena el código en una sesión para verificarlo en la siguiente etapa
            session_start();
            $_SESSION['codigo_verificacion'] = $codigoVerificacion;
            $_SESSION['telefonoUsuario'] = $telefono;
            
            // Si se guardo el código con éxito Enviar el mensaje de Verificación
            // Envia el SMS al usuario con el codigo de verificación
            require_once '../model/configuracionSMSRecuperacion.php';
                
        } else {
            #echo 'No se encontró ningún usuario con ese telefono';
            header("Location: ../view/recuperarPassword.php?message=error_tel");
            exit();
        }
    
    } else {
        // Algunos Campos estan Vacios
        header("Location: ../view/recuperarPassword.php?error=campos_vacios");
        exit();
    }

}

?>