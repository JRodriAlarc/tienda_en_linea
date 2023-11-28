<?php

class actualizarToken {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function almacenarToken($usuarioId, $token) {
        // Lógica para almacenar el token en la base de datos asociado al usuario
        $query = "UPDATE usuario SET token = ? WHERE nif = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $token, $usuarioId);
        
        // Solo se ejecuta una vez
        $stmt->execute();
        
        // Puedes agregar verificaciones y manejo de errores aquí
        if ($stmt->affected_rows <= 0) {
            throw new Exception("No se actualizó ningún registro");
        }  
    }
}

?>
