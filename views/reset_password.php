<?php
session_start();
include("../config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conexion, $_GET['token']);

    // Verificar el token
    $sql = "SELECT user_id, expiry FROM password_resets WHERE token = '$token'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $userId = $row['user_id'];
        $expiry = $row['expiry'];

        // Verificar si el token aún es válido
        if (strtotime($expiry) > time()) {
            // Mostrar el formulario para restablecer contraseña
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nuevaPassword = mysqli_real_escape_string($conexion, $_POST['new_password']);
                $nuevaPasswordHash = sha1($nuevaPassword);

                // Actualizar la contraseña en la base de datos
                $sqlUpdate = "UPDATE usuarios SET password = '$nuevaPasswordHash' WHERE idusuarios = '$userId'";
                if ($conexion->query($sqlUpdate)) {
                    // Eliminar el token para evitar reutilización
                    $conexion->query("DELETE FROM password_resets WHERE token = '$token'");
                    echo "<script>
                            alert('Contraseña actualizada con éxito.');
                            window.location = 'login.php';
                        </script>";
                } else {
                    echo "<script>alert('Error al actualizar la contraseña.');</script>";
                }
            }
        } else {
            echo "<script>
                    alert('El enlace ha expirado.');
                    window.location = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Enlace no válido.');
                window.location = 'login.php';
            </script>";
    }
}
?>

<!-- Formulario de nueva contraseña -->
<form action="" method="POST">
    <fieldset>
        <label class="block clearfix">
            <span class="block input-icon input-icon-right">
                <input type="password" name="new_password" class="form-control" placeholder="Nueva Contraseña" required />
                <i class="ace-icon fa fa-lock"></i>
            </span>
        </label>
        <div class="clearfix">
            <button type="submit" class="width-35 pull-right btn btn-sm btn-success">
                <i class="ace-icon fa fa-check"></i>
                <span class="bigger-110">Restablecer</span>
            </button>
        </div>
    </fieldset>
</form>
