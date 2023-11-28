<?php

class comprobarSMSActualizarPassword {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function comprobarSMSActualizarPassword($telefono) {
        // Lógica para buscar un usuario por su telefono en la base de datos
        $query = "SELECT * FROM usuario WHERE telefono = ?";
        
        // Retorna los datos del usuario si se encuentra, o NULL si no existe
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $telefono);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

}

?>
