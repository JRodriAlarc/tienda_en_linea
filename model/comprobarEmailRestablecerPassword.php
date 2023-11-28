<?php

class comprobarEmailRestablecerPassword {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function comprobarEmailRestablecerPassword($email) {
        // Lógica para buscar un usuario por su correo electrónico en la base de datos
        $query = "SELECT * FROM usuario WHERE correoElectronico = ?";
        
        // Retorna los datos del usuario si se encuentra, o NULL si no existe
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function actualizarPasswordConToken($token, $nuevaContraseña) {
        // Lógica para actualizar la contraseña en la base de datos asociada al token
        $query = "UPDATE usuario SET userPassword = ? WHERE token = ?";
        
        $hashedPassword = password_hash($nuevaContraseña, PASSWORD_DEFAULT); // Aplica el hash a la nueva contraseña

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $hashedPassword, $token);
        $stmt->execute();
        
        return $stmt->affected_rows > 0; // Devuelve true si se actualizó la contraseña correctamente
    }

}

?>
