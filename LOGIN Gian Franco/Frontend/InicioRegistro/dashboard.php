<?php
session_start();

// Verificar autenticación
if(!isset($_SESSION['usuario'])) {
    header("Location: login.html?error=no_autenticado");
    exit;
}

// Configuración de la página
$titulo = "Panel de Usuario";
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_GET['login']) && $_GET['login'] === 'exito'): ?>
        <div class="alert-success">
            ¡Bienvenido de nuevo, <?php echo htmlspecialchars($usuario['nombre']); ?>!
        </div>
        <?php endif; ?>

        <h1><?php echo $titulo; ?></h1>
        
        <div class="user-info">
            <p><strong>Nombre completo:</strong> <?php echo htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']); ?></p>
            <p><strong>Nombre de usuario:</strong> <?php echo htmlspecialchars($usuario['usuario']); ?></p>
            <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
            <p><strong>Miembro desde:</strong> <?php echo date('d/m/Y', strtotime($usuario['registro'])); ?></p>
            
        </div>

        <a href="logout.php" class="btn-logout">Cerrar sesión</a>
    </div>
</body>
</html>