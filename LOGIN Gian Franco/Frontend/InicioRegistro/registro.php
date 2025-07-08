<?php
require 'conexion.php';

if(isset($_POST['registro'])) {
    // Validación de campos
    $errores = [];
    $datos = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'apellido' => trim($_POST['apellido'] ?? ''),
        'nombre_usuario' => trim($_POST['nombre_usuario'] ?? ''),
        'correo' => trim($_POST['correo'] ?? ''),
        'contrasena' => $_POST['contrasena'] ?? ''
    ];

    // Validar campos requeridos
    foreach($datos as $campo => $valor) {
        if(empty($valor)) {
            $errores[] = "El campo " . str_replace('_', ' ', $campo) . " es requerido";
        }
    }

    // Validaciones específicas
    if(!filter_var($datos['correo'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo no es válido";
    }

    if(strlen($datos['contrasena']) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    }

    // Procesar registro si no hay errores
    if(empty($errores)) {
        // Escapar datos
        foreach($datos as $campo => $valor) {
            $datos[$campo] = mysqli_real_escape_string($conexion, $valor);
        }
        $datos['contrasena'] = password_hash($datos['contrasena'], PASSWORD_DEFAULT);

        // Verificar si usuario/correo existen
        $sql = "SELECT id_user FROM usuarios WHERE nombre_usuario = '{$datos['nombre_usuario']}' OR correo = '{$datos['correo']}' LIMIT 1";
        $resultado = mysqli_query($conexion, $sql);
        
        if(mysqli_num_rows($resultado) > 0) {
            $errores[] = "El nombre de usuario o correo ya están registrados";
        } else {
            // Insertar nuevo usuario
            $sql = "INSERT INTO usuarios (nombre, apellido, nombre_usuario, correo, contrasena) 
                    VALUES ('{$datos['nombre']}', '{$datos['apellido']}', '{$datos['nombre_usuario']}', '{$datos['correo']}', '{$datos['contrasena']}')";

            if(mysqli_query($conexion, $sql)) {
                $nuevo_id = mysqli_insert_id($conexion);
                echo "<script>
                        alert('✅ Registro exitoso\\\\n\\\\nID: $nuevo_id\\\\nUsuario: {$datos['nombre_usuario']}\\\\nCorreo: {$datos['correo']}');
                        window.location.href = 'login.html';
                      </script>";
                exit;
            } else {
                $errores[] = "Error al registrar: " . mysqli_error($conexion);
            }
        }
    }

    // Mostrar errores
    if(!empty($errores)) {
        echo "<script>
                alert('⚠️ Errores en el registro:\\\\n\\\\n" . implode("\\\\n", $errores) . "');
                window.history.back();
              </script>";
        exit;
    }
}
?>