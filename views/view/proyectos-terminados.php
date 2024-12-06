<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos Terminados</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto terminado...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <!-- Tarjeta 1 -->
                <div class="project-card" data-project="TerminadoProyecto1">
                    <div class="project-card-content">
                        <h3>Sistema de Matrícula Digital</h3>
                        <p class="project-preview">Implementación exitosa en facultades</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Dic 2023
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="project-card" data-project="TerminadoProyecto2">
                    <div class="project-card-content">
                        <h3>Portal de Egresados</h3>
                        <p class="project-preview">Seguimiento de graduados</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Ene 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="project-card" data-project="TerminadoProyecto3">
                    <div class="project-card-content">
                        <h3>Biblioteca Virtual</h3>
                        <p class="project-preview">Acceso digital a recursos</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Feb 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="project-card" data-project="TerminadoProyecto4">
                    <div class="project-card-content">
                        <h3>Sistema de Notas Online</h3>
                        <p class="project-preview">Gestión de calificaciones</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Mar 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="project-card" data-project="TerminadoProyecto5">
                    <div class="project-card-content">
                        <h3>Portal Administrativo</h3>
                        <p class="project-preview">Gestión administrativa</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Abr 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="project-card" data-project="TerminadoProyecto6">
                    <div class="project-card-content">
                        <h3>Sistema de Trámites</h3>
                        <p class="project-preview">Gestión de trámites académicos</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                May 2024
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel derecho -->
        <div class="project-details-panel" id="projectDetails">
            <div class="details-placeholder">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5">
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
                <h3>Selecciona un proyecto</h3>
                <p>Ver detalles del proyecto completado</p>
            </div>
        </div>
    </div>
</div>

<script>
// Datos de los proyectos terminados
const completedProjectData = {
    "TerminadoProyecto1": {
        titulo: "Sistema de Matrícula Digital",
        pi: "Carolina Vega",
        invest: "Andrés Mora",
        asesor: "Patricia Luna",
        inversionista: "Eduardo Castro",
        estado: "Completado",
        fechaInicio: "Jun 2023",
        fechaFin: "Dic 2023",
        area: "Gestión Académica",
        presupuesto: "$40,000",
        resultado: "Implementación exitosa en todas las facultades",
        impacto: "Reducción del 80% en tiempo de matrícula"
    },
    // ... [Agregar datos para los otros 5 proyectos]
};

document.addEventListener('DOMContentLoaded', function() {
    initializeCompletedProjects();
});
</script>