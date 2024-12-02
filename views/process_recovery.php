<?php
session_start();
include("../config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);

    // Verificar si el correo está registrado
    $sql = "SELECT idusuarios FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $userId = $row['idusuarios'];

        // Generar un token único
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insertar el token en la tabla de recuperación
        $sqlToken = "INSERT INTO password_resets (user_id, token, expiry) VALUES ('$userId', '$token', '$expiry')";
        $conexion->query($sqlToken);

        // Enviar correo
        $resetLink = "http://localhost/reset_password.php?token=$token";
        $subject = "Recuperación de Contraseña";
        $message = "
            <p>Hola,</p>
            <p>Recibimos una solicitud para restablecer tu contraseña. Haz clic en el enlace para continuar:</p>
            <a href='$resetLink'>$resetLink</a>
            <p>Este enlace es válido por 1 hora.</p>
        ";
        $headers = "Content-type: text/html; charset=UTF-8\r\n";

        if (mail($correo, $subject, $message, $headers)) {
            echo "<script>
                    alert('Correo enviado. Revisa tu bandeja de entrada.');
                    window.location = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al enviar el correo. Inténtalo de nuevo.');
                    window.location = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Correo no registrado.');
                window.location = 'login.php';
            </script>";
    }
}
?>
