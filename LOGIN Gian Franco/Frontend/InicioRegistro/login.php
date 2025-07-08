<?php
require 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y limpiar datos
    $nombre_usuario = mysqli_real_escape_string($conexion, $_POST['nombre_usuario'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' LIMIT 1";
    $resultado = mysqli_query($conexion, $sql);
    
    if(mysqli_num_rows($resultado) === 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if(password_verify($contrasena, $usuario['contrasena'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['usuario'] = [
                'id' => $usuario['id_user'],
                'nombre' => $usuario['nombre'],
                'apellido' => $usuario['apellido'],
                'usuario' => $usuario['nombre_usuario'],
                'correo' => $usuario['correo'],
                'registro' => $usuario['fecha_registro']
            ];
            
            // Redirección con parámetros de éxito
            header("Location: dashboard.php?login=exito&usuario=".urlencode($usuario['nombre_usuario']));
            exit;
        } else {
            echo "<script>
                    alert('🔒 Contraseña incorrecta para el usuario: $nombre_usuario');
                    window.location.href = 'login.html';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('❌ Usuario no encontrado: $nombre_usuario');
                window.location.href = 'login.html';
              </script>";
        exit;
    }
}
?>