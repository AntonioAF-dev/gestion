<?php
session_start();
require '../vendor/autoload.php';
require '../config/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Función para validar el token y obtener el ID del usuario
function validateToken($conexion, $token)
{
    $sql = "SELECT user_id, expiry FROM password_resets 
            WHERE token = ? AND expiry > NOW()";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        return $result->fetch_assoc()['user_id'];
    }
    return false;
}

// Si se recibe un token por GET, mostrar el formulario
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user_id = validateToken($conexion, $token);

    if ($user_id) {
        // Mostrar formulario para cambiar contraseña
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta charset="UTF-8">
            <title>Restablecer Contraseña</title>
            <meta name="description" content="User password reset page" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

            <!-- bootstrap & fontawesome -->
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
            <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
            <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
            <link rel="stylesheet" href="../assets/css/ace.min.css" />
            <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
        </head>

        <body class="login-layout light-login">
            <div class="main-container">
                <div class="main-content">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="login-container">
                                <div class="center">
                                    <h1>
                                        <i class="ace-icon fa fa-leaf green"></i>
                                        <span class="red">Sistema </span>
                                        <span class="grey" id="id-text2">de Usuarios</span>
                                    </h1>
                                    <h4 class="blue" id="id-company-text">&copy; Digitaliza UDH</h4>
                                </div>
                                <div class="space-6"></div>

                                <div class="position-relative">
                                    <div id="reset-box" class="login-box visible widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h4 class="header blue lighter bigger">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    Restablecer Contraseña
                                                </h4>
                                                <div class="space-6"></div>

                                                <form method="POST" onsubmit="return validateForm()">
                                                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                                                    <fieldset>
                                                        <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input type="password" id="password" name="password"
                                                                    class="form-control" placeholder="Nueva Contraseña" required />
                                                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
                                                        </label>

                                                        <label class="block clearfix">
                                                            <span class="block input-icon input-icon-right">
                                                                <input type="password" id="confirm_password" name="confirm_password"
                                                                    class="form-control" placeholder="Confirmar Contraseña" required />
                                                                <i class="ace-icon fa fa-lock"></i>
                                                            </span>
                                                        </label>
                                                        <div id="password_error" class="red"></div>

                                                        <div class="space-14"></div>
                                                        <div class="clearfix">
                                                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                                <i class="ace-icon fa fa-key"></i>
                                                                <span class="bigger-110">Actualizar</span>
                                                            </button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <div class="toolbar center">
                                                <a href="login.php" class="back-to-login-link">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    Volver al Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="../assets/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            </script>

            <script>
                function validateForm() {
                    var password = document.getElementById('password').value;
                    var confirm_password = document.getElementById('confirm_password').value;
                    var error = document.getElementById('password_error');

                    if (password.length < 6) {
                        error.innerHTML = '<i class="ace-icon fa fa-times-circle"></i> La contraseña debe tener al menos 6 caracteres';
                        return false;
                    }

                    if (password !== confirm_password) {
                        error.innerHTML = '<i class="ace-icon fa fa-times-circle"></i> Las contraseñas no coinciden';
                        return false;
                    }

                    return true;
                }
            </script>
        </body>

        </html>
<?php
    } else {
        echo "<script>
                alert('El enlace ha expirado o no es válido.');
                window.location = 'login.php';
            </script>";
    }
}

// Si se recibe el formulario por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'])) {
    $token = $_POST['token'];
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    $user_id = validateToken($conexion, $token);

    if ($user_id) {
        $password_encriptada = sha1($password);

        $update_sql = "UPDATE usuarios SET password = ? WHERE idusuarios = ?";
        $stmt = $conexion->prepare($update_sql);
        $stmt->bind_param("si", $password_encriptada, $user_id);

        if ($stmt->execute()) {
            $delete_sql = "DELETE FROM password_resets WHERE token = ?";
            $stmt = $conexion->prepare($delete_sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();

            echo "<script>
                    alert('Tu contraseña ha sido actualizada correctamente. Por favor, inicia sesión con tu nueva contraseña.');
                    window.location = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Ocurrió un error al actualizar la contraseña: " . $conexion->error . "');
                    window.location = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('El enlace ha expirado o no es válido.');
                window.location = 'login.php';
            </script>";
    }
}
?>