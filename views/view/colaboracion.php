<?php
// Datos de ejemplo de colaboradores
$collaborators = [
    [
        'id' => 1,
        'name' => 'Ana García',
        'role' => 'Investigador Principal',
        'expertise' => ['Machine Learning', 'Data Analysis', 'Python'],
        'projects' => 4,
        'contributions' => 127,
        'hours' => 320,
        'avatar' => 'avatar1.jpg',
        'performance' => 95
    ],
    [
        'id' => 2,
        'name' => 'Carlos Ruiz',
        'role' => 'Desarrollador Senior',
        'expertise' => ['Java', 'Spring Boot', 'MongoDB'],
        'projects' => 3,
        'contributions' => 98,
        'hours' => 280,
        'avatar' => 'avatar2.jpg',
        'performance' => 88
    ],
    [
        'id' => 3,
        'name' => 'Laura Martínez',
        'role' => 'Analista de Datos',
        'expertise' => ['R', 'SQL', 'Tableau'],
        'projects' => 5,
        'contributions' => 145,
        'hours' => 300,
        'avatar' => 'avatar3.jpg',
        'performance' => 92
    ]
];

// Datos de ejemplo de tecnologías
$projectTechnologies = [
    'Lenguajes de Programación' => [
        ['name' => 'Python', 'level' => 'Avanzado', 'icon' => 'fa-python'],
        ['name' => 'Java', 'level' => 'Avanzado', 'icon' => 'fa-java'],
        ['name' => 'JavaScript', 'level' => 'Intermedio', 'icon' => 'fa-js'],
        ['name' => 'PHP', 'level' => 'Avanzado', 'icon' => 'fa-php']
    ],
    'Frontend' => [
        ['name' => 'React', 'level' => 'Avanzado', 'icon' => 'fa-react'],
        ['name' => 'Angular', 'level' => 'Intermedio', 'icon' => 'fa-angular'],
        ['name' => 'Vue.js', 'level' => 'Básico', 'icon' => 'fa-vuejs'],
        ['name' => 'Bootstrap', 'level' => 'Avanzado', 'icon' => 'fa-bootstrap']
    ],
    'Backend' => [
        ['name' => 'Node.js', 'level' => 'Avanzado', 'icon' => 'fa-node-js'],
        ['name' => 'Spring Boot', 'level' => 'Intermedio', 'icon' => 'fa-leaf'],
        ['name' => 'Django', 'level' => 'Avanzado', 'icon' => 'fa-python'],
        ['name' => 'Laravel', 'level' => 'Intermedio', 'icon' => 'fa-php']
    ],
    'Bases de Datos' => [
        ['name' => 'MongoDB', 'level' => 'Avanzado', 'icon' => 'fa-database'],
        ['name' => 'PostgreSQL', 'level' => 'Avanzado', 'icon' => 'fa-database'],
        ['name' => 'MySQL', 'level' => 'Avanzado', 'icon' => 'fa-database'],
        ['name' => 'Redis', 'level' => 'Intermedio', 'icon' => 'fa-database']
    ]
];

// Datos de ejemplo de contribuciones mensuales
$monthlyContributions = [
    'Ana García' => [
        'Ene' => 15,
        'Feb' => 18,
        'Mar' => 20,
        'Abr' => 22,
        'May' => 25,
        'Jun' => 27
    ],
    'Carlos Ruiz' => [
        'Ene' => 12,
        'Feb' => 15,
        'Mar' => 18,
        'Abr' => 16,
        'May' => 20,
        'Jun' => 17
    ],
    'Laura Martínez' => [
        'Ene' => 18,
        'Feb' => 19,
        'Mar' => 20,
        'Abr' => 25,
        'May' => 25,
        'Jun' => 21
    ]
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Colaboración - Gestión de Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/css/ace.min.css" />
    <style>
        .collaborator-card {
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }

        .collaborator-card:hover {
            transform: translateY(-5px);
        }

        .expertise-tag {
            display: inline-block;
            padding: 2px 8px;
            margin: 2px;
            border-radius: 12px;
            background-color: #f8f9fa;
            font-size: 0.85em;
        }

        .tech-badge {
            padding: 8px 12px;
            margin: 4px;
            border-radius: 15px;
            display: inline-block;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .tech-badge:hover {
            transform: translateY(-2px);
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.2);
        }

        .tech-badge i {
            margin-right: 5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #2196F3;
        }
    </style>
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="../admin.php" class="navbar-brand">
                    <small><i class="fa fa-leaf"></i> ⬅️ Home || 🧑‍💻 Colaboraciones en Proyectos 🧑‍💻</small>
                </a>
            </div>
        </div>
    </div>
    <div class="main-container" id="main-container">
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Informe de Colaboraciones
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Vista General del Equipo
                            </small>
                        </h1>
                    </div>

                    <!-- Resumen de Estadísticas -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h5 class="widget-title">Total Colaboradores</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="stat-value"><?php echo count($collaborators); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h5 class="widget-title">Total Contribuciones</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="stat-value">
                                            <?php echo array_sum(array_column($collaborators, 'contributions')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h5 class="widget-title">Horas Totales</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="stat-value">
                                            <?php echo array_sum(array_column($collaborators, 'hours')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h5 class="widget-title">Rendimiento Promedio</h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="stat-value">
                                            <?php
                                            $avgPerformance = array_sum(array_column($collaborators, 'performance')) / count($collaborators);
                                            echo round($avgPerformance, 1) . '%';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos de Contribuciones -->
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Contribuciones por Colaborador</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <canvas id="contributionsChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Distribución Total</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <canvas id="totalContributionsChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de Colaboradores -->
                    <div class="row">
                        <?php foreach ($collaborators as $collaborator): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="widget-box collaborator-card">
                                    <div class="widget-header">
                                        <h4 class="widget-title"><?php echo $collaborator['name']; ?></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <img src="../../assets/images/avatars/<?php echo $collaborator['avatar']; ?>"
                                                        alt="<?php echo $collaborator['name']; ?>"
                                                        class="img-responsive"
                                                        onerror="this.src='../../assets/images/avatars/avatar2.png'">
                                                </div>
                                                <div class="col-xs-8">
                                                    <p><strong>Rol:</strong> <?php echo $collaborator['role']; ?></p>
                                                    <p><strong>Proyectos:</strong> <?php echo $collaborator['projects']; ?></p>
                                                    <p><strong>Contribuciones:</strong> <?php echo $collaborator['contributions']; ?></p>
                                                    <div class="expertise-tags">
                                                        <?php foreach ($collaborator['expertise'] as $skill): ?>
                                                            <span class="expertise-tag"><?php echo $skill; ?></span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="space-6"></div>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: <?php echo $collaborator['performance']; ?>%">
                                                    <?php echo $collaborator['performance']; ?>% Rendimiento
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Actualizar la sección de Tecnologías -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Tecnologías del Proyecto</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <?php foreach ($projectTechnologies as $category => $technologies): ?>
                                            <div class="technology-category">
                                                <h4 class="header smaller lighter blue">
                                                    <i class="ace-icon fa fa-code"></i>
                                                    <?php echo $category; ?>
                                                </h4>
                                                <div class="row">
                                                    <?php foreach ($technologies as $tech): ?>
                                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                                            <div class="tech-item">
                                                                <div class="tech-badge <?php echo strtolower($tech['level']); ?>">
                                                                    <i class="fa <?php echo $tech['icon']; ?>"></i>
                                                                    <span class="tech-name"><?php echo $tech['name']; ?></span>
                                                                    <span class="label label-info"><?php echo $tech['level']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="space-6"></div>
                                            </div>
                                        <?php endforeach; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <!-- Inicialización de gráficos -->
    <script>
        jQuery(function($) {
            // Función para generar colores
            function generateColors(num) {
                const colors = [
                    '#2ecc71', // verde
                    '#3498db', // azul
                    '#e74c3c', // rojo
                    '#f1c40f', // amarillo
                    '#9b59b6', // morado
                    '#1abc9c', // turquesa
                    '#e67e22', // naranja
                    '#34495e' // azul oscuro
                ];
                return colors.slice(0, num);
            }

            // Datos de contribuciones
            const contributionsData = {
                'Ana García': {
                    'Ene': 15,
                    'Feb': 18,
                    'Mar': 20,
                    'Abr': 22,
                    'May': 25,
                    'Jun': 27
                },
                'Carlos Ruiz': {
                    'Ene': 12,
                    'Feb': 15,
                    'Mar': 18,
                    'Abr': 16,
                    'May': 20,
                    'Jun': 17
                },
                'Laura Martínez': {
                    'Ene': 18,
                    'Feb': 19,
                    'Mar': 20,
                    'Abr': 25,
                    'May': 25,
                    'Jun': 21
                }
            };

            // Configuración base para los gráficos
            const months = Object.keys(Object.values(contributionsData)[0]);
            const colors = generateColors(Object.keys(contributionsData).length);

            const chartConfig = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                }
            };

            // Gráfico de líneas - Contribuciones por colaborador
            new Chart(document.getElementById('contributionsChart').getContext('2d'), {
                type: 'line',
                data: {
                    labels: months,
                    datasets: Object.entries(contributionsData).map(([name, data], index) => ({
                        label: name,
                        data: Object.values(data),
                        borderColor: colors[index],
                        backgroundColor: `${colors[index]}20`,
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: colors[index],
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: colors[index]
                    }))
                },
                options: {
                    ...chartConfig,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Número de Contribuciones',
                                padding: {
                                    bottom: 10
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 5
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    plugins: {
                        ...chartConfig.plugins,
                        tooltip: {
                            ...chartConfig.plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.parsed.y} contribuciones`;
                                }
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            // Calcular totales para el gráfico de distribución
            const totals = Object.entries(contributionsData).reduce((acc, [name, data]) => {
                acc[name] = Object.values(data).reduce((sum, val) => sum + val, 0);
                return acc;
            }, {});

            // Gráfico circular - Distribución total de contribuciones
            new Chart(document.getElementById('totalContributionsChart').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(totals),
                    datasets: [{
                        data: Object.values(totals),
                        backgroundColor: colors,
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    ...chartConfig,
                    cutout: '60%',
                    plugins: {
                        ...chartConfig.plugins,
                        tooltip: {
                            ...chartConfig.plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((context.parsed / total) * 100).toFixed(1);
                                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Animación de números en las estadísticas
            $('.stat-value').each(function() {
                const $this = $(this);
                const value = parseInt($this.text().replace(/,/g, ''));
                $({
                    Counter: 0
                }).animate({
                    Counter: value
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.ceil(this.Counter).toLocaleString());
                    }
                });
            });

            // Inicializar tooltips de Bootstrap
            $('[data-toggle="tooltip"]').tooltip();

            // Efectos hover para las tarjetas
            $('.collaborator-card').hover(
                function() {
                    $(this).addClass('hover-shadow').css('transform', 'translateY(-5px)');
                },
                function() {
                    $(this).removeClass('hover-shadow').css('transform', 'translateY(0)');
                }
            );

            // Animación de las barras de progreso
            $('.progress-bar').each(function() {
                const $this = $(this);
                const width = $this.data('width');
                $this.css('width', '0%').animate({
                    width: width + '%'
                }, {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                });
            });
        });
    </script>
</body>

</html>