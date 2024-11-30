<?php
session_start();
session_destroy(); // Destruye la sesión actual
header("Location: ../index.php"); // Redirige al inicio o a otra página deseada
exit;
?>
