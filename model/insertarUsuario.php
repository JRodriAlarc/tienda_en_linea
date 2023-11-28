<?php
class insertarUsuario {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function insertarUsuario($nif, $correoElectronico, $nombre, $direccion, $telefono, $login, $userPassword, $rol) {
        $query = "INSERT INTO usuario (nif, correoElectronico, nombre, direccion, telefono, login, userPassword, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssss", $nif, $correoElectronico, $nombre, $direccion, $telefono, $login, $hashedPassword, $rol);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>
