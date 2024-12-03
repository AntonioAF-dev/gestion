<?php
include("../config/conexion.php");
define('ROOT_PATH', __DIR__ . '/');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../views/login.php");
    exit();
}

$iduser = $_SESSION['id_usuario'];
$sql = "SELECT idusuarios, Nombre, Correo, usuario FROM usuarios WHERE idusuarios = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_name = $conexion->real_escape_string($_POST['new_name']);
    $new_email = $conexion->real_escape_string($_POST['new_email']);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify current password
    $verify_sql = "SELECT password FROM usuarios WHERE idusuarios = '$iduser'";
    $verify_result = $conexion->query($verify_sql);
    $user_data = $verify_result->fetch_assoc();

    if (password_verify($current_password, $user_data['password'])) {
        // Prepare update query
        $update_query = "UPDATE usuarios SET Nombre = '$new_name', Correo = '$new_email'";

        // Handle password change if new password is provided
        if (!empty($new_password)) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_query .= ", password = '$hashed_password'";
            } else {
                $error = "Las contraseñas no coinciden";
            }
        }

        $update_query .= " WHERE idusuarios = '$iduser'";

        if ($conexion->query($update_query)) {
            $success = "Perfil actualizado exitosamente";
            // Refresh user data
            $row['Nombre'] = $new_name;
            $row['Correo'] = $new_email;
        } else {
            $error = "Error al actualizar el perfil: " . $conexion->error;
        }
    } else {
        $error = "Contraseña actual incorrecta";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Perfil - Sistema de Gestión</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/ace.min.css">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }

        .success-message {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="no-skin">
    <div class="main-container ace-save-state" id="main-container">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="profile-container">
                        <div class="profile-header">
                            <h2>Modificar Perfil</h2>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="error-message alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($success)): ?>
                            <div class="success-message alert alert-success">
                                <?php echo $success; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" name="new_name" class="form-control"
                                    value="<?php echo htmlspecialchars($row['Nombre']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="email" name="new_email" class="form-control"
                                    value="<?php echo htmlspecialchars($row['Correo']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Nombre de Usuario</label>
                                <input type="text" class="form-control"
                                    value="<?php echo htmlspecialchars($row['usuario']); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Contraseña Actual *</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Nueva Contraseña (Opcional)</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Confirmar Nueva Contraseña</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Actualizar Perfil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>