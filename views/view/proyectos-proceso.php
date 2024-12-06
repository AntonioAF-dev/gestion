<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos en Proceso</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto en proceso...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <!-- Tarjeta 1 -->
                <div class="project-card" data-project="ProcesoProyecto1">
                    <div class="project-card-content">
                        <h3>Sistema de Gestión de Laboratorios</h3>
                        <p class="project-preview">Sistema integral para gestión de laboratorios</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 70%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Nov 2023
                            </span>
                            <span class="project-status in-progress">70%</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="project-card" data-project="ProcesoProyecto2">
                    <div class="project-card-content">
                        <h3>App de Control de Asistencia</h3>
                        <p class="project-preview">Sistema de registro y control</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 45%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Dic 2023
                            </span>
                            <span class="project-status in-progress">45%</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="project-card" data-project="ProcesoProyecto3">
                    <div class="project-card-content">
                        <h3>Portal de Recursos Humanos</h3>
                        <p class="project-preview">Sistema de gestión de personal</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Ene 2024
                            </span>
                            <span class="project-status in-progress">60%</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="project-card" data-project="ProcesoProyecto4">
                    <div class="project-card-content">
                        <h3>Sistema de Inventario</h3>
                        <p class="project-preview">Control de activos y materiales</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 35%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Feb 2024
                            </span>
                            <span class="project-status in-progress">35%</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="project-card" data-project="ProcesoProyecto5">
                    <div class="project-card-content">
                        <h3>Plataforma de Evaluación</h3>
                        <p class="project-preview">Sistema de evaluación docente</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Mar 2024
                            </span>
                            <span class="project-status in-progress">85%</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="project-card" data-project="ProcesoProyecto6">
                    <div class="project-card-content">
                        <h3>Sistema de Pagos Online</h3>
                        <p class="project-preview">Plataforma de pagos institucionales</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 55%"></div>
                        </div>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Abr 2024
                            </span>
                            <span class="project-status in-progress">55%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel derecho -->
        <div class="project-details-panel" id="projectDetails">
            <div class="details-placeholder">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5">
                    <path d="M12 2v20M2 12h20"></path>
                </svg>
                <h3>Selecciona un proyecto</h3>
                <p>Ver detalles y progreso del proyecto</p>
            </div>
        </div>
    </div>
</div>

<script>
// Datos de los proyectos en proceso
const processProjectData = {
    "ProcesoProyecto1": {
        titulo: "Sistema de Gestión de Laboratorios",
        pi: "Fernando Ruiz",
        invest: "Carmen Torres",
        asesor: "Roberto Sánchez",
        inversionista: "Gabriel Silva",
        estado: "En Proceso",
        fechaInicio: "Nov 2023",
        area: "Gestión Académica",
        presupuesto: "$28,000",
        duracion: "9 meses",
        avance: "70%",
        siguienteMeta: "Implementación de módulo de reservas"
    },
    // ... [Datos para los otros 5 proyectos]
};

document.addEventListener('DOMContentLoaded', function() {
    initializeProcessProjects();
});
</script>