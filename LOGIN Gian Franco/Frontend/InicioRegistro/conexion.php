<?php
// Definimos las credenciales de la base de datos
$servidor = "localhost"; // servidor de la base de datos
$usuario = "mercedes"; // usuario de la base de datos
$contraseña = "Tc)KzWrJ3zLlLZpK"; // contraseña de la base de datos
$base_de_datos = "usuarios"; // nombre de la base de datos

// Creamos la conexión a la base de datos utilizando la función mysqli_conexionect
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

// Verificamos si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error()); // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}

// $sql = "CREATE TABLE IF NOT EXISTS usuarios (
//     id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
//     nombre VARCHAR(50) NOT NULL,
//     apellido VARCHAR(50) NOT NULL,
//     correo VARCHAR(100) NOT NULL UNIQUE,
//     contrasena VARCHAR(255) NOT NULL
// )";
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows ($resultado)> 0 ) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "ID: " . $fila["id_user"] . " - Nombre: " . $fila["nombre"] . " - Apellido: " . $fila["apellido"] . $fila["nombre_usuario"] . " - Correo: " . $fila["correo"] . "<br>";
    }
}else {
    echo "No se encontraron registros en la tabla usuarios.";
}

// Cerramos la conexión a la base de datos utilizando la función mysqli_close
mysqli_close($conexion);
?>
