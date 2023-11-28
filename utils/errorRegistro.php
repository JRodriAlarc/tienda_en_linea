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

if (isset($_GET['error']) && isset($errorMessages[$_GET['error']])) {
  $errorMessage = $errorMessages[$_GET['error']];
  echo "<p style='color:red;'>$errorMessage</p>";
}

?>