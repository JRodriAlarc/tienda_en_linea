<?php

if (isset($_SESSION['usuarioEmail'])) {
    echo "<p>La sesión ha sido iniciada para el usuario con ID:"  . $_SESSION['usuarioId'] . "</p>";
    echo "<p>La sesión ha sido iniciada para el usuario con EMAIL: " . $_SESSION['usuarioEmail'] . "</p>";
    echo "<p>La sesión ha sido iniciada para el usuario con LOGIN: " . $_SESSION['usuarioLogin'] . "</p>";
} else {
    echo "La sesión no ha sido iniciada";
}

?>