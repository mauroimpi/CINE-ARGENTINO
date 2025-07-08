<?php
// Configuración de la base de datos
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mercedes');
define('DB_PASSWORD', 'Tc)KzWrJ3zLlLZpK');
define('DB_NAME', 'usuarios');

// Establecer conexión
$conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar charset
mysqli_set_charset($conexion, "utf8mb4");

// No cerrar la conexión aquí
?>