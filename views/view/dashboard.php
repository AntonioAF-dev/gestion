<?php
require_once '../../config/configuracion.php';
require_once 'dashboard-functions.php';

try {
    $db = new PDO("mysql:host=$server;dbname=$bd", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Inicializar variables con valores por defecto
$stats = getProjectStats($db);
if (!$stats) {
    $stats = [
        'total' => 0,
        'completed' => 0,
        'in_progress' => 0,
        'delayed' => 0,
        'total_researchers' => 0,
        'avg_completion' => 0,
        'completion_trend' => [],
        'recent_activities' => []
    ];
}

$projects = getProjectDetails($db);
if (!$projects) {
    $projects = [];
}

$recentActivities = getRecentActivities($db);
if (!$recentActivities) {
    $recentActivities = [];
}

// Asegurarse de que completion_trend existe y tiene datos
if (!isset($stats['completion_trend']) || !is_array($stats['completion_trend'])) {
    $stats['completion_trend'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard de Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/css/ace.min.css" />
    <link rel="stylesheet" href="../../assets/css/dashboard-styles.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="../admin.php" class="navbar-brand">
                    <small><i class="fa fa-leaf"></i> ⬅️ Home || 💻 Dashboard de Proyectos 👨‍💻</small>
                </a>
            </div>
        </div>
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <div class="page-header">
            <h1>
                Panel de Análisis
                <small><i class="ace-icon fa fa-angle-double-right"></i> Resumen de Proyectos</small>
            </h1>
        </div>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="dashboard-container">
                        <!-- Stats Row -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="stat-widget">
                                    <div class="widget-header">
                                        <h5><i class="fa fa-folder-open"></i> Total Proyectos</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="stat-value" data-value="<?php echo $stats['total']; ?>">
                                            <?php echo $stats['total']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="stat-widget">
                                    <div class="widget-header">
                                        <h5><i class="fa fa-check-circle"></i> Completados</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="stat-value" data-value="<?php echo $stats['completed']; ?>">
                                            <?php echo $stats['completed']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="stat-widget">
                                    <div class="widget-header">
                                        <h5><i class="fa fa-users"></i> Investigadores</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="stat-value">
                                            <?php echo $stats['total_researchers']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="stat-widget">
                                    <div class="widget-header">
                                        <h5><i class="fa fa-line-chart"></i> Progreso Promedio</h5>
                                    </div>
                                    <div class="widget-body">
                                        <div class="stat-value">
                                            <?php echo round($stats['avg_completion']); ?>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4><i class="fa fa-list"></i> Proyectos Activos</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <?php if (!empty($projects)): ?>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Proyecto</th>
                                                            <th>Estado</th>
                                                            <th>Progreso</th>
                                                            <th>Presupuesto</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($projects as $project): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($project['name']); ?></td>
                                                                <td>
                                                                    <span class="status-badge <?php echo getStatusClass($project['status']); ?>">
                                                                        <?php echo htmlspecialchars($project['status']); ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="progress-container">
                                                                        <div class="progress-bar" style="width: <?php echo $project['completion']; ?>%">
                                                                            <span class="progress-label"><?php echo $project['completion']; ?>%</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>$<?php echo number_format($project['budget'], 2); ?></td>
                                                                <td>
                                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                                        <a class="blue" href="#" title="Ver detalles">
                                                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                                        </a>
                                                                        <a class="green" href="#" title="Editar">
                                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                        </a>
                                                                        <a class="red" href="#" title="Eliminar">
                                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php else: ?>
                                                <div class="alert alert-info">
                                                    <i class="fa fa-info-circle"></i>
                                                    No hay proyectos para mostrar.
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ace-elements.min.js"></script>
    <script src="../../assets/js/ace.min.js"></script>
    </script>
</body>

</html>