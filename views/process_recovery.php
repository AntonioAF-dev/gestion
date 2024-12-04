<?php
session_start();
include("../config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);

    $sql = "SELECT usuario, idusuarios FROM usuarios WHERE Correo = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $usuario = $row['usuario'];
        $user_id = $row['idusuarios'];

        // Generar token único
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+24 hours'));

        // Eliminar tokens anteriores del usuario
        $delete_old = "DELETE FROM password_resets WHERE user_id = ?";
        $stmt = $conexion->prepare($delete_old);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Guardar nuevo token
        $sql_token = "INSERT INTO password_resets (user_id, token, expiry) 
                    VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql_token);
        $stmt->bind_param("iss", $user_id, $token, $expiry);
        $stmt->execute();

        // URL base de tu sitio
        $base_url = "http://localhost"; // Cambia esto por tu URL real
        $reset_link = $base_url . "/gestion/views/reset_password.php?token=" . $token;

        $to = $email;
        $subject = "Recuperación de contraseña";
        $message = "
            Hola $usuario,<br><br>
            Hemos recibido tu solicitud para recuperar la contraseña.<br>
            Para establecer una nueva contraseña, haz clic en el siguiente enlace:<br><br>
            <a href='$reset_link'>Recuperar contraseña</a><br><br>
            Este enlace expirará en 24 horas por razones de seguridad.<br>
            Si no solicitaste este cambio, puedes ignorar este correo.<br><br>
            Saludos,<br>
            Equipo de soporte.
        ";

        $headers = "From: soporte@tusitio.com\r\n";
        $headers .= "Reply-To: soporte@tusitio.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "<script>
                    alert('Se ha enviado un enlace de recuperación a tu correo. Por favor revisa tu bandeja de entrada.');
                    window.location = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('No se pudo enviar el correo. Intenta más tarde.');
                    window.location = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('El correo ingresado no está registrado.');
                window.location = 'login.php';
            </script>";
    }
} else {
    header("Location: login.php");
    exit;
}
