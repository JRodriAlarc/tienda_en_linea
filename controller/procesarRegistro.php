<?php
require_once('../model/conexionBD.php');
require_once('../model/insertarUsuario.php');

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nif = $_POST['nif'];
    $correoElectronico = $_POST['correoElectronico'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $login = $_POST['login'];
    $userPassword = $_POST['userPassword'];
    $rol = $_POST['userRol'];

    // Crear instancia del modelo
    $procesarRegistro = new insertarUsuario($conexion);

    // Verificar que todos los campos estén completos
    if (!empty($nif) && !empty($correoElectronico) && !empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($login) && !empty($userPassword) && !empty($rol)) {
        
        // Validar el formato del NIF (Ejemplo de NIF: A-98765432)
        if (!preg_match("/^[A-C]{1}-[0-9]{7}[0-9]{1}$/", $nif)) {
            // El formato del NIF es incorrecto
            header("Location: ../view/registro.php?error=3");
            exit();
        }

        // Validar el formato del correo electrónico
        if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
            // El formato del correo electrónico es incorrecto
            header("Location: ../view/registro.php?error=4");
            exit();
        }

        // Verificar que el teléfono tenga 10 dígitos numéricos
        if (!preg_match("/^[0-9]{10}$/", $telefono)) {
            // El formato del teléfono es incorrecto
            header("Location: ../view/registro.php?error=5");
            exit();
        }

        // Validar si el correo electrónico ya está registrado
        $queryCorreo = "SELECT COUNT(*) as countCorreo FROM usuario WHERE correoElectronico = '$correoElectronico'";
        $resultCorreo = mysqli_query($conexion, $queryCorreo);
        $rowCorreo = mysqli_fetch_assoc($resultCorreo);

        if ($rowCorreo['countCorreo'] > 0) {
            // El correo electrónico ya está registrado
            header("Location: ../view/registro.php?error=6");
            exit();
        }

        // Validar si el NIF ya está registrado
        $queryNIF = "SELECT COUNT(*) as countNIF FROM usuario WHERE nif = '$nif'";
        $resultNIF = mysqli_query($conexion, $queryNIF);
        $rowNIF = mysqli_fetch_assoc($resultNIF);

        if ($rowNIF['countNIF'] > 0) {
            // El NIF ya está registrado
            header("Location: ../view/registro.php?error=7");
            exit();
        }

        // Si todos los datos pasan las validaciones, puedes proceder a almacenarlos en la base de datos.
        // Insertar usuario en la base de datos
        $registroExitoso = $procesarRegistro->insertarUsuario($nif, $correoElectronico, $nombre, $direccion, $telefono, $login, $userPassword, $rol);

        if ($registroExitoso) {
            // Crear variables de sesión después del registro exitoso
            session_start();
            $_SESSION['usuarioId'] = $nif;
            $_SESSION['usuarioEmail'] = $correoElectronico;
            $_SESSION['usuarioLogin'] = $login;
            $_SESSION['usuarioRol'] = $rol;

            // Redirigir al usuario a la página de inicio o donde desees después del registro
            header("Location: ../view/home.php");
            exit();
        } else {
            // Redirigir de vuelta a la página de registro con un mensaje de error
            header("Location: ../view/registro.php?error=1");
            exit();
        }
        
    } else {
        // Algunos campos están vacíos
        header("Location: ../view/registro.php?error=2");
        exit();
    }
    
}
?>
