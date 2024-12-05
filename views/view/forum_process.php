

<?php
// view/forum_process.php - Simplificar usando la función
session_start();
include("../../config/conexion.php");
include("../../config/configuracion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $usuario_id = $_SESSION['id_usuario'];
    
    if (insertarPost($conexion, $titulo, $contenido, $usuario_id)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>