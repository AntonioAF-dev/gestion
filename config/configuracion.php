<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Credenciales de acceso a la base de datos.
$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'gp';
