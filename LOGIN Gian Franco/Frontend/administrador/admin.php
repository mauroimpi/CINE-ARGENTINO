<?php
require_once __DIR__ . '/../../controllers/C_usuario.php';

$controlador = new C_usuario();
$usuarios = $controlador->obtenerUsuarios(); // Trae los datos reales desde la base
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="admin.css" />
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>admin</title>
</head>
<body>
<!-- Menú superior -->
<div class="top-menu">
  <div class="titulo-superior">Panel Administrador</div>
  <div class="user-menu">
    <i class='bx bx-user'></i>
    <div class="dropdown">
      <a href="#">Iniciar sesión</a>
      <a href="#">Registrarse</a>
      <a href="#">Cerrar sesión</a>
    </div>
  </div>
</div>

<!-- Panel lateral izquierdo -->
<header class="sidebar">
  <nav>
    <ul>
        <li><a href="#" data-section="inicio">Inicio</a></li>
        <li><a href="#" data-section="usuarios">Usuarios</a></li>
        <li><a href="#" data-section="peliculas">Peliculas</a></li>
        <li><a href="#" data-section="buscar">Buscar</a></li>
        <li><a href="#" data-section="agregar">Agregar</a></li>
        <li><a href="#" data-section="modificar">Modificar</a></li>
        <li><a href="#" data-section="eliminar">Eliminar</a></li>
        <li><a href="#" data-section="salir">Salir del panel</a></li>
    </ul>
  </nav>
</header>

<main id="main-content">
  <!-- INICIO -->
  <section id="inicio" class="seccion">
    <h2 class="titulo-inicio">Inicio al Administrador</h2>
    <div class="info-inicio">
      <p>Este panel está diseñado para la administración del cine argentino...</p>
    </div>
  </section>

  <!-- USUARIOS -->
  <section id="usuarios" class="seccion oculto">
    <h2 class="titulo-seccion">Tabla de registros</h2>
    <p class="descripcion-usuarios">Lista de personas registradas en nuestra aplicación móvil.</p>

    <div class="tabla-contenedor">
      <table class="tabla-usuarios">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo Electrónico</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?= htmlspecialchars($usuario['nombre']) ?></td>
              <td><?= htmlspecialchars($usuario['apellido']) ?></td>
              <td><?= htmlspecialchars($usuario['correo']) ?></td>
              <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
              <td>••••••</td>
              <td>
                <button class="btn-eliminar">Eliminar</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>


</main>

<script src="adminitracion.js"></script>
</body>
</html>
