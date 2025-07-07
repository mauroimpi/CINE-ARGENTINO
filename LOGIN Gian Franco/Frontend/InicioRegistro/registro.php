<?php
require 'conexion.php';

// Verificar si la conexión está activa
if(!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(isset($_POST['registro'])) {
    // 1. Recoger datos del formulario
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $nombre_usuario = trim($_POST['nombre_usuario']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // 2. Validaciones básicas
    $errores = [];
    if(empty($nombre)) $errores[] = "El nombre es requerido";
    if(empty($apellido)) $errores[] = "El apellido es requerido";
    if(empty($nombre_usuario)) $errores[] = "El nombre de usuario es requerido";
    if(empty($correo)) $errores[] = "El correo es requerido";
    if(empty($contrasena)) $errores[] = "La contraseña es requerida";
    if(strlen($contrasena) < 6) $errores[] = "La contraseña debe tener al menos 6 caracteres";

    // 3. Procesar si no hay errores
    if(empty($errores)) {
        // Escapar valores para seguridad
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $apellido = mysqli_real_escape_string($conexion, $apellido);
        $nombre_usuario = mysqli_real_escape_string($conexion, $nombre_usuario);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        // Verificar si usuario/correo ya existen
        $sql_verificar = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' OR correo = '$correo' LIMIT 1";
        $resultado = mysqli_query($conexion, $sql_verificar);

        if(mysqli_num_rows($resultado) > 0) {
            $errores[] = "El usuario o correo ya están registrados";
        } else {
            // Insertar nuevo registro
            $sql_insert = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, correo, contrasena) 
                          VALUES ('$nombre', '$apellido', '$nombre_usuario', '$correo', '$contrasena')";

            if(mysqli_query($conexion, $sql)) {
    // Obtener ID del nuevo usuario
    $nuevo_id = mysqli_insert_id($conexion);
    
    echo "<script>
            alert('¡Registro exitoso!\\nTu nombre de usuario: $nombre_usuario\\nID de registro: $nuevo_id');
            window.location.href = 'login.html';
          </script>";
    exit;
} else {
    echo "<script>
            alert('Error en el registro: " . addslashes(mysqli_error($conexion)) . "');
            window.history.back();
          </script>";
    exit;
}
        }
    }

    // Mostrar errores si existen
    if(!empty($errores)) {
        echo "<script>
                alert('Errores:\\n" . implode("\\n", $errores) . "');
                window.history.back();
              </script>";
        exit;
    }
}

// No cerrar la conexión aquí, déjala abierta para otras operaciones
?>