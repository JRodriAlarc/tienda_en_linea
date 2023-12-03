<?php

$errorMessages = [
  1 => "Error al registrar el usuario. Inténtalo de nuevo.",
  2 => "Todos los campos son obligatorios. Inténtalo de nuevo.",
  3 => "El formato del NIF es incorrecto. Inténtalo de nuevo.",
  4 => "El formato del Correo Electrónico es incorrecto. Inténtalo de nuevo.",
  5 => "El formato del Teléfono es incorrecto. Inténtalo de nuevo.",
  6 => "Verifique sus datos ya que el Correo Electrónico ya se encuentra registrado",
  7 => "Verifique sus datos ya que el NIF ya se encuentra registrado"
];

/*
if (isset($_GET['error']) && isset($errorMessages[$_GET['error']])) {
  $errorMessage = $errorMessages[$_GET['error']];
  echo "<p style='color:red;'>$errorMessage</p>";
}
*/

echo "<div id='errorDiv' style='display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffe5e5; color: #ff0000; padding: 20px; border-radius: 15px; border: 1px solid #ff0000; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 9999;'>
        <span onclick='cerrarError()' style='cursor: pointer; position: absolute; top: 5px; right: 10px; font-weight: bold;'>x</span>
        <div id='errorMessage'></div>
      </div>";

echo "<script>
        function mostrarError(message) {
          const errorDiv = document.getElementById('errorDiv');
          const errorMessageDiv = document.getElementById('errorMessage');
          errorMessageDiv.innerHTML = message;
          errorDiv.style.display = 'block';
        }

        function cerrarError() {
          const errorDiv = document.getElementById('errorDiv');
          errorDiv.style.display = 'none';
        }
        
        ";

echo "window.onload = function() {";
if (isset($_GET['error']) && isset($errorMessages[$_GET['error']])) {
    $errorMessage = $errorMessages[$_GET['error']];
    echo "mostrarError('$errorMessage');";
}
echo "};
      </script>";

?>