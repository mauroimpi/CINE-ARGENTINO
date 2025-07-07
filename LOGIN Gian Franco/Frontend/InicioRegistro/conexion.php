<?php
$servidor = "localhost";
$usuario = "mercedes";
$contraseña = "Tc)KzWrJ3zLlLZpK";
$base_de_datos = "usuarios";

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar charset
mysqli_set_charset($conexion, "utf8mb4");

// No cierres la conexión aquí, déjala abierta
?>