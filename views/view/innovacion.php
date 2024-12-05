<?php
// Datos de ejemplo para proyectos de innovación
$innovationProjects = [
    [
        'id' => 1,
        'title' => 'Sistema IA para Análisis Predictivo',
        'description' => 'Implementación de inteligencia artificial para predecir tendencias y comportamientos de usuarios.',
        'proposed_by' => 'Ana García',
        'department' => 'Desarrollo',
        'investment_needed' => 75000,
        'potential_roi' => 150,
        'rating' => 4.5,
        'votes' => 12,
        'status' => 'Pendiente',
        'priority' => 'Alta',
        'tags' => ['IA', 'Machine Learning', 'Big Data']
    ],
    [
        'id' => 2,
        'title' => 'Plataforma Blockchain para Transacciones',
        'description' => 'Sistema descentralizado para gestionar transacciones de manera segura y transparente.',
        'proposed_by' => 'Carlos Ruiz',
        'department' => 'Finanzas',
        'investment_needed' => 120000,
        'potential_roi' => 200,
        'rating' => 4.2,
        'votes' => 8,
        'status' => 'En Revisión',
        'priority' => 'Media',
        'tags' => ['Blockchain', 'Fintech', 'Seguridad']
    ]
];

// Datos de ejemplo para inversionistas potenciales
$investors = [
    [
        'id' => 1,
        'name' => 'Tech Ventures Capital',
        'focus_areas' => ['IA', 'Blockchain', 'Cloud'],
        'min_investment' => 50000,
        'max_investment' => 500000,
        'previous_investments' => 15,
        'contact' => 'contact@techventures.com',
        'status' => 'Interesado',
        'rating' => 5
    ],
    [
        'id' => 2,
        'name' => 'Digital Innovation Fund',
        'focus_areas' => ['Fintech', 'E-commerce', 'SaaS'],
        'min_investment' => 100000,
        'max_investment' => 1000000,
        'previous_investments' => 8,
        'contact' => 'invest@digitalfund.com',
        'status' => 'En Contacto',
        'rating' => 4
    ]
];

function getRatingStars($rating)
{
    $stars = '';
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            $stars .= '<i class="ace-icon fa fa-star text-warning"></i>';
        } elseif ($halfStar && $i == $fullStars + 1) {
            $stars .= '<i class="ace-icon fa fa-star-half-o text-warning"></i>';
        } else {
            $stars .= '<i class="ace-icon fa fa-star-o text-warning"></i>';
        }
    }
    return $stars;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Innovación y Mejoras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/css/ace.min.css" />
    <style>
        .project-card,
        .investor-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover,
        .investor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .tag {
            display: inline-block;
            padding: 2px 8px;
            margin: 2px;
            border-radius: 12px;
            background-color: #f8f9fa;
            font-size: 0.85em;
        }

        .rating-input {
            display: none;
        }

        .rating-star {
            cursor: pointer;
            color: #ddd;
        }

        .rating-star.active {
            color: #f1c40f;
        }

        .priority-high {
            color: #d9534f;
        }

        .priority-medium {
            color: #f0ad4e;
        }

        .priority-low {
            color: #5bc0de;
        }

        .inversionista-form {
            width: 98%;
            margin: auto;
        }

        /* Variables para colores y sombras */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-color: #f8f9fa;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --text-color: #333;
            --success-color: #2ecc71;
        }

        /* Estilos para el modal */
        .modal-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            border-bottom: none;
            border-radius: 8px 8px 0 0;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .modal-body {
            background: var(--background-color);
            padding: 2rem;
        }

        /* Estilos para el formulario */
        #newInvestorForm .form-group {
            margin-bottom: 1.5rem;
        }

        #newInvestorForm label {
            color: var(--text-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        #newInvestorForm .form-control {
            border: 2px solid var(--border-color);
            border-radius: 6px;
            padding: 0.8rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 4px var(--shadow-color);
        }

        #newInvestorForm .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        /* Estilos para los botones */
        .modal-footer {
            background: var(--background-color);
            border-top: 1px solid var(--border-color);
            padding: 1.5rem;
            border-radius: 0 0 8px 8px;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-default {
            background: white;
            border: 2px solid var(--border-color);
            color: var(--text-color);
        }

        .btn-default:hover {
            background: var(--border-color);
        }

        .btn-primary {
            background: var(--secondary-color);
            border: none;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-1px);
            box-shadow: 0 6px 8px rgba(52, 152, 219, 0.3);
        }

        /* Validación de formulario */
        .form-control:invalid {
            border-color: #e74c3c;
        }

        .form-control:valid {
            border-color: var(--success-color);
        }

        /* Animaciones */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>

<body class="no-skin">
    <div class="main-container" id="main-container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="../admin.php" class="navbar-brand">
                        <small><i class="fa fa-users"></i> ⬅️ Home || 🫷🤖🫸 💻 Innovacion 🎖️📖📑📚 </small>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="page-header">
                        <h1>
                            Innovación y Mejoras
                            <small>
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                Gestión de Propuestas e Inversiones
                            </small>
                        </h1>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-success" data-toggle="modal" data-target="#newProjectModal">
                                <i class="ace-icon fa fa-plus"></i> Nueva Propuesta
                            </button>
                            <button class="btn btn-info" data-toggle="modal" data-target="#newInvestorModal">
                                <i class="ace-icon fa fa-user-plus"></i> Nuevo Inversionista
                            </button>
                        </div>
                    </div>

                    <div class="space-12"></div>

                    <!-- Proyectos de Innovación -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Proyectos de Innovación Propuestos</h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-8">
                                        <div class="row">
                                            <?php foreach ($innovationProjects as $project): ?>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="project-card widget-box">
                                                        <div class="widget-header widget-header-flat">
                                                            <h4 class="widget-title">
                                                                <?php echo $project['title']; ?>
                                                                <span class="pull-right">
                                                                    <?php echo getRatingStars($project['rating']); ?>
                                                                </span>
                                                            </h4>
                                                        </div>

                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <p><?php echo $project['description']; ?></p>
                                                                <div class="space-6"></div>

                                                                <div class="row">
                                                                    <div class="col-xs-6">
                                                                        <strong>Inversión Necesaria:</strong>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        $<?php echo number_format($project['investment_needed']); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-xs-6">
                                                                        <strong>ROI Potencial:</strong>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo $project['potential_roi']; ?>%
                                                                    </div>
                                                                </div>

                                                                <div class="space-6"></div>

                                                                <div class="tags">
                                                                    <?php foreach ($project['tags'] as $tag): ?>
                                                                        <span class="tag"><?php echo $tag; ?></span>
                                                                    <?php endforeach; ?>
                                                                </div>

                                                                <div class="space-6"></div>

                                                                <div class="action-buttons">
                                                                    <button class="btn btn-xs btn-success" onclick="voteProject(<?php echo $project['id']; ?>)">
                                                                        <i class="ace-icon fa fa-thumbs-up"></i> Votar
                                                                    </button>
                                                                    <button class="btn btn-xs btn-info" onclick="reviewProject(<?php echo $project['id']; ?>)">
                                                                        <i class="ace-icon fa fa-eye"></i> Revisar
                                                                    </button>
                                                                    <span class="pull-right">
                                                                        <i class="ace-icon fa fa-user"></i> <?php echo $project['proposed_by']; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-12"></div>

                    <!-- Inversionistas Potenciales -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Inversionistas Potenciales</h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main padding-8">
                                        <div class="row">
                                            <?php foreach ($investors as $investor): ?>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="investor-card widget-box">
                                                        <div class="widget-header widget-header-flat">
                                                            <h4 class="widget-title">
                                                                <?php echo $investor['name']; ?>
                                                                <span class="pull-right">
                                                                    <?php echo getRatingStars($investor['rating']); ?>
                                                                </span>
                                                            </h4>
                                                        </div>

                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <div class="row">
                                                                    <div class="col-xs-6">
                                                                        <strong>Rango de Inversión:</strong>
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        $<?php echo number_format($investor['min_investment']); ?> -
                                                                        $<?php echo number_format($investor['max_investment']); ?>
                                                                    </div>
                                                                </div>

                                                                <div class="space-6"></div>

                                                                <div class="tags">
                                                                    <?php foreach ($investor['focus_areas'] as $area): ?>
                                                                        <span class="tag"><?php echo $area; ?></span>
                                                                    <?php endforeach; ?>
                                                                </div>

                                                                <div class="space-6"></div>

                                                                <div class="action-buttons">
                                                                    <button class="btn btn-xs btn-success" onclick="contactInvestor(<?php echo $investor['id']; ?>)">
                                                                        <i class="ace-icon fa fa-envelope"></i> Contactar
                                                                    </button>
                                                                    <button class="btn btn-xs btn-info" onclick="viewProfile(<?php echo $investor['id']; ?>)">
                                                                        <i class="ace-icon fa fa-user"></i> Ver Perfil
                                                                    </button>
                                                                    <span class="pull-right">
                                                                        <i class="ace-icon fa fa-briefcase"></i> <?php echo $investor['previous_investments']; ?> inversiones previas
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    </div>

    <!-- Modal para Nueva Propuesta -->
    <div class="modal fade" id="newProjectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nueva Propuesta de Innovación</h4>
                </div>
                <div class="modal-body">
                    <form id="newProjectForm">
                        <div class="form-group">
                            <label>Título del Proyecto</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Inversión Necesaria ($)</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>ROI Estimado (%)</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tags (separados por coma)</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Prioridad</label>
                            <select class="form-control">
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="submitProject()">Guardar Propuesta</button>
                </div>
            </div>
        </div>
    </div>
    <div class="inversionista-form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Nuevo Inversionista</h4>
        </div>
        <div class="modal-body">
            <form id="newInvestorForm">
                <div class="form-group">
                    <label>Nombre de la Empresa</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Áreas de Interés (separadas por coma)</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Inversión Mínima ($)</label>
                    <input type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Inversión Máxima ($)</label>
                    <input type="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email de Contacto</label>
                    <input type="email" class="form-control" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="submitInvestor()">Guardar Inversionista</button>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Scripts necesarios -->
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ace-elements.min.js"></script>
    <script src="../../assets/js/ace.min.js"></script>

    <script>
        // Función para votar por un proyecto
        function voteProject(projectId) {
            // Implementar lógica de votación
            alert('Voto registrado para el proyecto ' + projectId);
        }

        // Función para revisar un proyecto
        function reviewProject(projectId) {
            // Implementar lógica de revisión
            window.location.href = 'review-project.php?id=' + projectId;
        }

        // Función para contactar a un inversionista
        function contactInvestor(investorId) {
            // Implementar lógica de contacto
            const investor = investors.find(inv => inv.id === investorId);
            if (investor) {
                window.location.href = `mailto:${investor.contact}`;
            }
        }

        // Función para ver el perfil de un inversionista
        function viewProfile(investorId) {
            // Implementar lógica de visualización de perfil
            window.location.href = 'investor-profile.php?id=' + investorId;
        }

        // Función para enviar nueva propuesta
        function submitProject() {
            const form = document.getElementById('newProjectForm');
            if (form.checkValidity()) {
                // Implementar lógica de guardado
                alert('Proyecto guardado exitosamente');
                $('#newProjectModal').modal('hide');
                form.reset();
            } else {
                alert('Por favor complete todos los campos requeridos');
            }
        }

        // Función para enviar nuevo inversionista
        function submitInvestor() {
            const form = document.getElementById('newInvestorForm');
            if (form.checkValidity()) {
                // Implementar lógica de guardado
                alert('Inversionista guardado exitosamente');
                $('#newInvestorModal').modal('hide');
                form.reset();
            } else {
                alert('Por favor complete todos los campos requeridos');
            }
        }
    </script>
</body>

</html>