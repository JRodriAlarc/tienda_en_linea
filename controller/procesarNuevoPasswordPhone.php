<?php
session_start();

// Verifica si existe el código de verificación en la sesión
if (!isset($_SESSION['codigo_verificacion'])) {
    #echo "No hay código de verificación en la sesión";
    header("Location: ../view/recuperarPassword.php?message=code_unknown"); // Redirige si no hay código almacenado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoIngresado = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'] . $_POST['digit6'];

    #echo $codigoIngresado;

    // Compara el código ingresado con el almacenado en la sesión
    if ($codigoIngresado === $_SESSION['codigo_verificacion']) {
        echo "El código es correcto, redirige a la página para restablecer la contraseña";
        #header("Location: ../view/restablecerPassword.php");
        #exit();
    } else {
        #echo "El código de verificación es incorrecto";
        header("Location: ../view/restablecerPasswordCode.php?message=invalid_code");
        exit();
    }
}
?>