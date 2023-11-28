<?php

class verificarCredenciales {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function verificarCredenciales($username, $password) {
        $query = "SELECT nif, correoElectronico, login, userPassword FROM usuario WHERE login = ? OR correoElectronico = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            $hashedPassword = $usuario['userPassword'];
            // Verificar la contraseña
            if (password_verify($password, $hashedPassword)) {
                return $usuario;
            }
        }
        return false;
    }
}

?>
