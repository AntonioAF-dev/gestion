<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos Catalogados</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <!-- Tarjeta 1 -->
                <div class="project-card" data-project="Proyecto1">
                    <div class="project-card-content">
                        <h3>Sistema de Gestión Académica</h3>
                        <p class="project-preview">Sistema integral para gestión universitaria</p>
                        <span class="project-status">En Revisión</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Ene 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="project-card" data-project="Proyecto2">
                    <div class="project-card-content">
                        <h3>Plataforma E-learning</h3>
                        <p class="project-preview">Sistema de educación virtual</p>
                        <span class="project-status">Aprobado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Feb 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="project-card" data-project="Proyecto3">
                    <div class="project-card-content">
                        <h3>Sistema de Biblioteca Digital</h3>
                        <p class="project-preview">Gestión de recursos bibliográficos</p>
                        <span class="project-status">En Revisión</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Mar 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4 -->
                <div class="project-card" data-project="Proyecto4">
                    <div class="project-card-content">
                        <h3>App Móvil Universitaria</h3>
                        <p class="project-preview">Aplicación móvil institucional</p>
                        <span class="project-status">Pendiente</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Abr 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 5 -->
                <div class="project-card" data-project="Proyecto5">
                    <div class="project-card-content">
                        <h3>Portal de Investigación</h3>
                        <p class="project-preview">Portal para investigadores</p>
                        <span class="project-status">Aprobado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                May 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 6 -->
                <div class="project-card" data-project="Proyecto6">
                    <div class="project-card-content">
                        <h3>Sistema de Admisión Online</h3>
                        <p class="project-preview">Plataforma de admisión virtual</p>
                        <span class="project-status">En Revisión</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Jun 2024
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
                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                    <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                <h3>Selecciona un proyecto</h3>
                <p>Haz clic en un proyecto para ver sus detalles</p>
            </div>
        </div>
    </div>
</div>

<script>
// Datos de los proyectos
const projectData = {
    "Proyecto1": {
        titulo: "Sistema de Gestión Académica",
        pi: "Juan Pérez",
        invest: "María López",
        asesor: "Carlos Ramírez",
        inversionista: "Ana Martínez",
        estado: "En Revisión",
        fechaInicio: "Ene 2024",
        area: "Desarrollo de Software",
        presupuesto: "$25,000",
        duracion: "8 meses"
    },
    "Proyecto2": {
        titulo: "Plataforma E-learning",
        pi: "Luis Gómez",
        invest: "Sofía Hernández",
        asesor: "Fernando Torres",
        inversionista: "Laura Gutiérrez",
        estado: "Aprobado",
        fechaInicio: "Feb 2024",
        area: "Educación Digital",
        presupuesto: "$30,000",
        duracion: "12 meses"
    },
    "Proyecto3": {
        titulo: "Sistema de Biblioteca Digital",
        pi: "Pedro Morales",
        invest: "Lucía Ortiz",
        asesor: "José Navarro",
        inversionista: "Claudia Vega",
        estado: "En Revisión",
        fechaInicio: "Mar 2024",
        area: "Gestión Documental",
        presupuesto: "$22,000",
        duracion: "6 meses"
    },
    "Proyecto4": {
        titulo: "App Móvil Universitaria",
        pi: "Ricardo Díaz",
        invest: "Patricia Suárez",
        asesor: "Miguel Vázquez",
        inversionista: "Roberto Méndez",
        estado: "Pendiente",
        fechaInicio: "Abr 2024",
        area: "Desarrollo Móvil",
        presupuesto: "$18,000",
        duracion: "5 meses"
    },
    "Proyecto5": {
        titulo: "Portal de Investigación",
        pi: "Sandra Castillo",
        invest: "Diego Alonso",
        asesor: "Valeria Núñez",
        inversionista: "Andrea Sánchez",
        estado: "Aprobado",
        fechaInicio: "May 2024",
        area: "Investigación",
        presupuesto: "$35,000",
        duracion: "10 meses"
    },
    "Proyecto6": {
        titulo: "Sistema de Admisión Online",
        pi: "Mario Ruiz",
        invest: "Carmen Vega",
        asesor: "Pablo Soto",
        inversionista: "Elena Castro",
        estado: "En Revisión",
        fechaInicio: "Jun 2024",
        area: "Admisión",
        presupuesto: "$28,000",
        duracion: "7 meses"
    }
};

document.addEventListener('DOMContentLoaded', function() {
    initializeCatalog();
});
</script>