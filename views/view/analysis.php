<?php
// Datos de ejemplo
$projectData = [
    [
        'name' => 'Proyecto Alpha',
        'status' => 'En Progreso',
        'completion' => 65,
        'budget' => 150000,
        'researchers' => 8,
        'start_date' => '2024-01-15'
    ],
    [
        'name' => 'Estudio Beta',
        'status' => 'Retrasado',
        'completion' => 30,
        'budget' => 75000,
        'researchers' => 5,
        'start_date' => '2024-02-01'
    ],
    [
        'name' => 'Investigación Gamma',
        'status' => 'Completado',
        'completion' => 100,
        'budget' => 200000,
        'researchers' => 12,
        'start_date' => '2024-01-01'
    ],
    [
        'name' => 'Proyecto Delta',
        'status' => 'En Progreso',
        'completion' => 45,
        'budget' => 120000,
        'researchers' => 6,
        'start_date' => '2024-02-15'
    ]
];

// Calcular estadísticas
$stats = [
    'total_projects' => count($projectData),
    'total_budget' => array_sum(array_column($projectData, 'budget')),
    'total_researchers' => array_sum(array_column($projectData, 'researchers')),
    'avg_completion' => array_sum(array_column($projectData, 'completion')) / count($projectData),
    'completed' => count(array_filter($projectData, fn($p) => $p['status'] === 'Completado')),
    'in_progress' => count(array_filter($projectData, fn($p) => $p['status'] === 'En Progreso')),
    'delayed' => count(array_filter($projectData, fn($p) => $p['status'] === 'Retrasado'))
];

// Función para obtener el color del estado
function getStatusColor($status) {
    switch ($status) {
        case 'Completado': return 'success';
        case 'En Progreso': return 'info';
        case 'Retrasado': return 'warning';
        default: return 'default';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Análisis de Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/css/ace.min.css" />
    <style>
        .metric-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }
        .metric-card:hover {
            transform: translateY(-5px);
        }
        .metric-value {
            font-size: 24px;
            font-weight: bold;
            color: #2196F3;
        }
        .progress-bar-bg {
            background-color: #f5f5f5;
            border-radius: 20px;
            height: 10px;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            border-radius: 20px;
            transition: width 0.5s ease-in-out;
        }
    </style>
</head>
<body class="no-skin">
    <div id="navbar" class="navbar navbar-default">
        <div class="navbar-container">
            <div class="navbar-header pull-left">
                <a href="../admin.php" class="navbar-brand">
                    <small><i class="fa fa-leaf"></i> ⬅️ Home || 📚 Análisis de Proyectos 📚</small>
                </a>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="main-content">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Panel de Análisis
                        <small><i class="ace-icon fa fa-angle-double-right"></i> Resumen de Proyectos</small>
                    </h1>
                </div>

                <!-- Métricas Principales -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget-box widget-color-blue">
                            <div class="widget-header">
                                <h5 class="widget-title">Total Proyectos</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="metric-value"><?php echo $stats['total_projects']; ?></div>
                                    <div>Proyectos Activos</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget-box widget-color-green">
                            <div class="widget-header">
                                <h5 class="widget-title">Presupuesto Total</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="metric-value">$<?php echo number_format($stats['total_budget'], 0); ?></div>
                                    <div>Inversión Total</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget-box widget-color-purple">
                            <div class="widget-header">
                                <h5 class="widget-title">Investigadores</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="metric-value"><?php echo $stats['total_researchers']; ?></div>
                                    <div>Total Personal</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget-box widget-color-orange">
                            <div class="widget-header">
                                <h5 class="widget-title">Progreso General</h5>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="metric-value"><?php echo round($stats['avg_completion']); ?>%</div>
                                    <div>Promedio</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Proyectos -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title">Detalle de Proyectos</h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thin-border-bottom">
                                            <tr>
                                                <th>Proyecto</th>
                                                <th>Estado</th>
                                                <th>Progreso</th>
                                                <th>Presupuesto</th>
                                                <th>Investigadores</th>
                                                <th>Inicio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($projectData as $project): ?>
                                            <tr>
                                                <td><?php echo $project['name']; ?></td>
                                                <td>
                                                    <span class="label label-<?php echo getStatusColor($project['status']); ?>">
                                                        <?php echo $project['status']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="progress progress-striped" style="margin-bottom: 0;">
                                                        <div class="progress-bar" style="width: <?php echo $project['completion']; ?>%">
                                                            <?php echo $project['completion']; ?>%
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>$<?php echo number_format($project['budget'], 0); ?></td>
                                                <td><?php echo $project['researchers']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($project['start_date'])); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumen de Estados -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">Resumen de Estados</h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 center">
                                            <div class="easy-pie-chart percentage" data-percent="<?php echo ($stats['completed']/$stats['total_projects'])*100; ?>" data-color="#87B87F">
                                                <span class="percent"><?php echo $stats['completed']; ?></span>
                                            </div>
                                            <div class="space-2"></div>
                                            Completados
                                        </div>

                                        <div class="col-xs-12 col-sm-4 center">
                                            <div class="easy-pie-chart percentage" data-percent="<?php echo ($stats['in_progress']/$stats['total_projects'])*100; ?>" data-color="#6FB3E0">
                                                <span class="percent"><?php echo $stats['in_progress']; ?></span>
                                            </div>
                                            <div class="space-2"></div>
                                            En Progreso
                                        </div>

                                        <div class="col-xs-12 col-sm-4 center">
                                            <div class="easy-pie-chart percentage" data-percent="<?php echo ($stats['delayed']/$stats['total_projects'])*100; ?>" data-color="#E68A88">
                                                <span class="percent"><?php echo $stats['delayed']; ?></span>
                                            </div>
                                            <div class="space-2"></div>
                                            Retrasados
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

    <!-- Scripts base -->
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.easypiechart.min.js"></script>
    <script src="../../assets/js/ace-elements.min.js"></script>
    <script src="../../assets/js/ace.min.js"></script>

    <!-- Script para inicializar los gráficos -->
    <script>
    jQuery(function($) {
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this);
            var barColor = $(this).data('color') || '#FF0000';
            var trackColor = '#E2E2E2';
            var size = parseInt($(this).data('size')) || 100;

            $box.easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: 8,
                animate: 1000,
                size: size
            });
        });
    });
    </script>
</body>
</html>