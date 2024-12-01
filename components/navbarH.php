<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it hasn't been started yet
}
$usuarioAutenticado = isset($_SESSION['usuario']);
?>

<div class="navbar-container" id="navbar-container">
    <div class="hora" id="hora"></div>
    <p class="title-header">GESTIÓN DIGITAL DE PROCESOS DE INVESTIGACIÓN</p>

    <?php if ($usuarioAutenticado): ?>
        <!-- Icono de perfil -->
        <a href="./views/perfil.php" class="btn-perfil">
            <i class="fa fa-user-circle"></i> Perfil
        </a>
        <!-- Botón de cerrar sesión -->
        <a href="./views/logout.php" class="btn-cerrar-sesion">Cerrar Sesión</a>
    <?php else: ?>
        <!-- Botón de iniciar sesión -->
        <a href="./views/login.php" class="btn-iniciar-sesion">Iniciar Sesión</a>
    <?php endif; ?>
</div>

<!-- Asegúrate de incluir Font Awesome para el ícono -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
