<?php
require 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = mysqli_real_escape_string($conexion, $_POST['nombre_usuario']);
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $resultado = mysqli_query($conexion, $sql);
    
    if(mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if(password_verify($contrasena, $usuario['contrasena'])) {
            session_start();
            $_SESSION['usuario'] = $usuario['nombre_usuario'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>
                    alert('Contraseña incorrecta');
                    window.location = 'index.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Usuario no encontrado');
                window.location = 'index.html';
              </script>";
    }

    mysqli_close($conexion);
}
?>