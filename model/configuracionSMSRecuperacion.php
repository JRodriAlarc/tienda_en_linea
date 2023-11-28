<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/../utils/infobip/autoload.php";
include_once('configs.php');

try{

    $smsBaseUrl = SMS_URL_BASE_DE_API;
    $smsApiKey = SMS_CLAVE_API;

    $configuracion = new Configuration(host: $smsBaseUrl, apiKey: $smsApiKey);

    $apiData = new SmsApi(config:$configuracion);

    $destinatario = new SmsDestination(to: $number);
    $mensaje = new SmsTextualMessage(
        destinations: [$destinatario],
        from: "compraYa",
        text: 'Este es el codigo para Reestablecer su Password: **'.$codigoVerificacion.'**'
        
    );
    $request = new SmsAdvancedTextualRequest(messages: [$mensaje]);
    $response = $apiData->sendSmsMessage($request);

    #echo "Mensaje enviado";
    header("Location: ../view/restablecerPasswordCode.php?message=send_code");
    exit();

} catch (Exception $e) {
    #echo "El SMS no pudo ser enviado. Error";
    header("Location: ../view/recuperarPassword.php?message=bad_sms");
    exit();
}

?>