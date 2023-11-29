<?php

class actualizarPasswordConSMS {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizarPasswordConSMS($telefonoRecuperacion, $nuevaContraseña) {
        // Lógica para actualizar la contraseña en la base de datos asociada al token
        $query = "UPDATE usuario SET userPassword = ? WHERE telefono = ?";
        
        $hashedPassword = password_hash($nuevaContraseña, PASSWORD_DEFAULT); // Aplica el hash a la nueva contraseña
    
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $hashedPassword, $telefonoRecuperacion);
        $stmt->execute();
        
        return $stmt->affected_rows > 0; // Devuelve true si se actualizó la contraseña correctamente
    }
}

?>