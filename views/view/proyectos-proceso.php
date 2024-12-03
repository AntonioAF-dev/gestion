<div class="process-projects-container">
    <!-- Panel izquierdo -->
    <div class="projects-list-panel">
        <h2>Proyectos en Proceso</h2>
        <div class="search-container">
            <input type="text" id="searchProjects" placeholder="Buscar proyecto en proceso..." class="search-input">
        </div>

        <div class="project-cards">
            <?php
            // Ejemplo de datos obtenidos desde una base de datos
            $projects = [
                [
                    "title" => "Sistema de Gestión de Laboratorios",
                    "description" => "Sistema integral para administración de laboratorios universitarios.",
                    "progress" => 70,
                    "start_date" => "Nov 2023",
                    "duration" => "9 meses"
                ],
                [
                    "title" => "App de Control de Asistencia",
                    "description" => "Aplicación móvil para registro y control de asistencia.",
                    "progress" => 45,
                    "start_date" => "Dic 2023",
                    "duration" => "7 meses"
                ]
            ];

            foreach ($projects as $project) {
                echo '
                <div class="project-card" data-project="' . htmlspecialchars($project['title']) . '">
                    <h3 class="card-title">' . htmlspecialchars($project['title']) . '</h3>
                    <p class="card-description">' . htmlspecialchars($project['description']) . '</p>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: ' . $project['progress'] . '%"></div>
                        </div>
                        <div class="project-meta">
                            <div class="start-date">
                                <span>Inicio:</span>
                                <span>' . htmlspecialchars($project['start_date']) . '</span>
                            </div>
                            <div class="duration">
                                <span>' . htmlspecialchars($project['duration']) . '</span>
                            </div>
                        </div>
                    </div>
                    <span class="progress-indicator">' . $project['progress'] . '%</span>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <!-- Panel derecho -->
    <div class="project-details" id="projectDetails">
        <div class="empty-state">
            <div class="empty-state-icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5">
                    <path d="M12 20v-8m0 0V4m0 8h8m-8 0H4" />
                </svg>
            </div>
            <h3>Selecciona un proyecto</h3>
            <p>Ver detalles y progreso del proyecto</p>
        </div>
    </div>
</div>

<style>
    .process-projects-container {
        display: flex;
        gap: 1rem;
        background-color: #fff;
        color: #1a1a1a;
        border-radius: 8px;
        overflow: hidden;
        padding: 1rem;
    }

    .projects-list-panel {
        width: 40%;
        padding: 1rem;
        background-color: #f9fafb;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .projects-list-panel h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #3b82f6;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .search-container {
        margin-bottom: 1.5rem;
    }

    .search-input {
        width: 100%;
        padding: 0.75rem;
        border-radius: 6px;
        border: 1px solid #e5e7eb;
        background-color: #fff;
        color: #1a1a1a;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .search-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 5px #3b82f6;
        outline: none;
    }

    .project-cards {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .project-card {
        background-color: #fff;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        background-color: #f0f9ff;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .card-description {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 1rem;
    }

    .progress-container {
        margin-top: 1rem;
        position: relative;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        background: #e5e7eb;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #10b981);
        transition: width 0.6s ease-in-out;
    }

    .progress-indicator {
        position: absolute;
        top: -1.5rem;
        right: 0;
        background: #3b82f6;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .project-card:hover .progress-indicator {
        background-color: #10b981;
        transform: scale(1.1);
    }
/*--------------*/
    .project-meta {
        margin-top: 1rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .project-meta .start-date {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1a1a1a;
        margin-top: 0.5rem;
        justify-content: space-between;
    }

    .project-meta .duration {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1a1a1a;
        margin-top: 0.5rem;
        display: flex;
        justify-content: space-between;
    }

    .project-details {
        width: 60%;
        padding: 2rem;
        background-color: #f9fafb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1a1a1a;
        border-radius: 8px;
    }

    .empty-state {
        text-align: center;
        color: #9ca3af;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .empty-state h3 {
        font-size: 1.25rem;
        margin-top: 0.5rem;
        color: #1a1a1a;
    }

    .empty-state p {
        font-size: 1rem;
        color: #6b7280;
    }

    @media (max-width: 768px) {
        .process-projects-container {
            flex-direction: column;
        }

        .projects-list-panel {
            width: 100%;
        }

        .project-details {
            width: 100%;
            margin-top: 1rem;
        }
    }
</style>