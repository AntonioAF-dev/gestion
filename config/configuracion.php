<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Credenciales de acceso a la base de datos.
$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'gp';

// config/configuracion.php - Añadir esta función
function insertarPost($conexion, $titulo, $contenido, $usuario_id)
{
    $stmt = $conexion->prepare("INSERT INTO foro_posts (titulo, contenido, usuario_id, fecha_creacion) VALUES (?, ?, ?, NOW())");
    if (!$stmt) {
        error_log("Error prepare: " . $conexion->error);
        return false;
    }

    $stmt->bind_param("ssi", $titulo, $contenido, $usuario_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>