<?php
require_once __DIR__ . '/../config/conexion.php';

class Usuario {
    public static function obtenerTodos() {
        global $conexion;
        $query = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion, $query);
        $usuarios = [];

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $usuarios[] = $fila;
            }
        }

        return $usuarios;
    }
}
