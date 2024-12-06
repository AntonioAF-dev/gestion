<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos Publicados</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto publicado...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <!-- Tarjeta 1 -->
                <div class="project-card" data-project="PublicadoProyecto1">
                    <div class="project-card-content">
                        <h3>Revista Digital Universitaria</h3>
                        <p class="project-preview">Plataforma de publicación académica</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Ene 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/rdu.2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="project-card" data-project="PublicadoProyecto2">
                    <div class="project-card-content">
                        <h3>Sistema de Análisis de Datos</h3>
                        <p class="project-preview">Investigación en ciencia de datos</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Feb 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/sad.2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="project-card" data-project="PublicadoProyecto3">
                    <div class="project-card-content">
                        <h3>Plataforma IoT Educativa</h3>
                        <p class="project-preview">Sistema de Internet de las Cosas</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Mar 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/iot.2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="project-card" data-project="PublicadoProyecto4">
                    <div class="project-card-content">
                        <h3>Investigación en IA Educativa</h3>
                        <p class="project-preview">Inteligencia Artificial en educación</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Abr 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/iae.2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="project-card" data-project="PublicadoProyecto5">
                    <div class="project-card-content">
                        <h3>Framework de Desarrollo Web</h3>
                        <p class="project-preview">Nuevo framework para aplicaciones</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                May 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/fwd.2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="project-card" data-project="PublicadoProyecto6">
                    <div class="project-card-content">
                        <h3>Sistema de Gestión Ambiental</h3>
                        <p class="project-preview">Monitoreo ambiental universitario</p>
                        <span class="project-status published">Publicado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Jun 2024
                            </span>
                            <span class="meta-item">
                                <i class="fa fa-book"></i>
                                DOI: 10.1234/sga.2024
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
                    <path d="M12 20V10M12 10L8 14M12 10l4 4"></path>
                </svg>
                <h3>Selecciona un proyecto</h3>
                <p>Ver detalles de la publicación</p>
            </div>
        </div>
    </div>
</div>

<script>
// Datos de los proyectos publicados
const publishedProjectData = {
    "PublicadoProyecto1": {
        titulo: "Revista Digital Universitaria",
        pi: "Isabel Montero",
        invest: "Héctor Ríos",
        asesor: "Carmen Paz",
        inversionista: "Ricardo Mora",
        estado: "Publicado",
        fechaInicio: "2023-05-15",
        fechaPublicacion: "2024-01-15",
        area: "Publicaciones Académicas",
        presupuesto: "$45,000",
        doi: "10.1234/rdu.2024",
        impactoAcademico: "Factor de impacto 3.2",
        citaciones: "25 citaciones en el primer mes",
        revista: "Journal of Educational Technology",
        linkPublicacion: "https://doi.org/10.1234/rdu.2024"
    },
    // ... [Datos para los otros 5 proyectos]
};

document.addEventListener('DOMContentLoaded', function() {
    initializePublishedProjects();
});
</script>