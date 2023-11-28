<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../utils/phpMailer/autoload.php'; // Ruta al archivo autoload.php de PHPMailer
require_once 'configs.php';

$mail = new PHPMailer(true);
try {
    // Configuración del servidor SMTP de Outlook 
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = SERVER_ENVIAR_EMAIL;
    $mail->Password = SERVER_PASSWORD_EMAIL;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    
    $mail->setFrom(SERVER_ENVIAR_EMAIL, 'CompraFacilYa');
    $mail->addReplyTo(SERVER_ENVIAR_EMAIL, 'CompraFacilYa');
    $mail->addAddress($email, $usuario['nombre']);
    $mail->Subject = 'Cambia tu Password';
    $mail->isHTML(true);
    $mail->Body = 'Haz clic en este enlace para restablecer tu Password: <a href="http://localhost/borrador/view/reestablecerPassword.php?token=' . $token . '">Restablecer Password</a>';
    
    $mail->send();
    #echo 'El correo ha sido enviado';
    header("Location: ../index.php?message=send_mail");
    exit();
} catch (Exception $e) {
    #echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
    header("Location: ../view/recuperarPassword.php?message=bad_mail");
    exit();
}

?>