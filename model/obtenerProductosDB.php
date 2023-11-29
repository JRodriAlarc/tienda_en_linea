<?php

class obtenerProductosDB {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerProductosDB() {
        // Realiza una consulta SQL para obtener los productos
        $query = "SELECT * FROM producto";
        $result = $this->conexion->query($query);

        // Procesa los resultados y devuelve los productos
        $productos = $result->fetch_all(MYSQLI_ASSOC);
        return $productos;
    }
}


?>