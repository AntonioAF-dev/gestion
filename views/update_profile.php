<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Actualizar Perfil - Sistema de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

    <!-- inline styles related to this page -->
    <script src="../assets/js/ace-extra.min.js"></script>
</head>

<body class="no-skin">
    <div class="main-container ace-save-state" id="main-container">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <?php
                    // Ensure we have the connection and session
                    include("../config/conexion.php");
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Get current user data
                    $iduser = $_SESSION['id_usuario'];
                    $sql = "SELECT * FROM usuarios WHERE idusuarios = ?";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param("i", $iduser);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();

                    // Handle form submission
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $usuario = $_POST['usuario'];

                        // Verificar si el nombre de usuario ya existe
                        $check_sql = "SELECT COUNT(*) as count FROM usuarios WHERE usuario = ? AND idusuarios != ?";
                        $check_stmt = $conexion->prepare($check_sql);
                        $check_stmt->bind_param("si", $usuario, $iduser);
                        $check_stmt->execute();
                        $check_result = $check_stmt->get_result()->fetch_assoc();

                        if ($check_result['count'] > 0) {
                            echo "<div class='alert alert-danger'><i class='ace-icon fa fa-times'></i> El nombre de usuario ya está en uso. Por favor, elija otro.</div>";
                        } else {
                            // Validación de contraseña
                            if (!empty($_POST['password'])) {
                                if (strlen($_POST['password']) < 6) {
                                    echo "<div class='alert alert-danger'><i class='ace-icon fa fa-times'></i> La contraseña debe tener al menos 6 caracteres</div>";
                                    exit();
                                }
                                $password = sha1($_POST['password']);
                            } else {
                                $password = $user['password'];
                            }

                            $update_sql = "UPDATE usuarios 
                                        SET usuario = ?,
                                            password = ?
                                        WHERE idusuarios = ?";

                            $update_stmt = $conexion->prepare($update_sql);
                            $update_stmt->bind_param("ssi", $usuario, $password, $iduser);

                            if ($update_stmt->execute()) {
                                echo "<div class='alert alert-success'><i class='ace-icon fa fa-check'></i> Perfil actualizado exitosamente. Serás redirigido al login...</div>";
                                // Destruir la sesión actual
                                session_destroy();
                                // Script para redirigir después de mostrar el mensaje
                                echo "<script>
                                        setTimeout(function() {
                                            window.location.href = '../views/login.php';
                                        }, 2000);
                                    </script>";
                            } else {
                                echo "<div class='alert alert-danger'><i class='ace-icon fa fa-times'></i> Error al actualizar el perfil: " . $conexion->error . "</div>";
                            }
                        }
                    }

                    // Helper function to safely get user data
                    function getUserData($user, $field)
                    {
                        return isset($user[$field]) ? htmlspecialchars($user[$field]) : '';
                    }
                    ?>
                    <div id="navbar" class="navbar navbar-default ace-save-state">
                        <div class="navbar-container ace-save-state" id="navbar-container">
                            <div class="navbar-header pull-left">
                                <a href="admin.php" class="navbar-brand">
                                    <small><i class="fa fa-leaf"></i> ⬅️ Home 👈|🚀 GestiónPro Hub 💻</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="page-header">
                        <h1>
                            Perfil de Usuario
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Actualiza tu información
                            </small>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-blue widget-header-flat">
                                    <h4 class="widget-title lighter">Actualizar Información Personal</h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <form class="form-horizontal" role="form" method="POST" id="updateProfileForm" onsubmit="return validateForm()">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right"> Nombre </label>
                                                <div class="col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" value="<?php echo getUserData($user, 'Nombre'); ?>"
                                                            class="form-control col-xs-10 col-sm-5" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-4"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right"> Correo </label>
                                                <div class="col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="email" value="<?php echo getUserData($user, 'Correo'); ?>"
                                                            class="form-control col-xs-10 col-sm-5" disabled />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-4"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right"> Usuario </label>
                                                <div class="col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="usuario" value="<?php echo getUserData($user, 'usuario'); ?>"
                                                            class="form-control col-xs-10 col-sm-5" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-4"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label no-padding-right"> Nueva Contraseña </label>
                                                <div class="col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="password" id="password" name="password"
                                                            class="form-control col-xs-10 col-sm-5"
                                                            placeholder="Dejar en blanco para mantener la actual" />
                                                    </div>
                                                    <div class="help-block">
                                                        <span class="text-info">
                                                            <i class="ace-icon fa fa-info-circle blue"></i>
                                                            La contraseña debe tener al menos 6 caracteres
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-4"></div>

                                            <div class="clearfix form-actions">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button class="btn btn-info" type="submit">
                                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                                        Actualizar
                                                    </button>
                                                    &nbsp; &nbsp; &nbsp;
                                                    <button class="btn" type="reset">
                                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                                        Restablecer
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- basic scripts -->
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- ace scripts -->
    <script src="../assets/js/ace-elements.min.js"></script>
    <script src="../assets/js/ace.min.js"></script>

    <script>
        function validateForm() {
            var password = document.getElementById('password').value;

            if (password !== '' && password.length < 6) {
                alert('La contraseña debe tener al menos 6 caracteres');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>