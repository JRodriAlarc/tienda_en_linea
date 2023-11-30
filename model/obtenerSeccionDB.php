<?php

class obtenerSeccionDB {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerSeccionDB() {
        // Realiza una consulta SQL para obtener las categorías
        $query = "SELECT * FROM seccion";
        $result = $this->conexion->query($query);

        // Procesa los resultados y devuelve las categorías
        $categorias = $result->fetch_all(MYSQLI_ASSOC);
        return $categorias;
    }
}

?>