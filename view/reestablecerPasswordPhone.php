<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../utils/css/recuperarPassword.css">
</head>
<body>

    <h2>Recuperar Contraseña usando SMS</h2>
    <form action="" method="post" id="verificationForm">
        <div id="verificationCode">
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit1" required>
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit2" required>
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit3" required>
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit4" required>
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit5" required>
            <input type="text" maxlength="1" pattern="\d" inputmode="numeric" id="digit6" required>
        </div>
        <button type="submit">Recuperar Contraseña</button>
    </form>
    
    <script src="../utils/js/recuperarPassword.js"></script>
</body>
</html>