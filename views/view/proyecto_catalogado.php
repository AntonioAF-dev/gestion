<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo: Lista de proyectos -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos Catalogados</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <div class="project-card" data-project="Proyecto 1">
                    <div class="project-card-content">
                        <h3>Sistema de Gestión Académica</h3>
                        <p class="project-preview">Sistema de Gestión Académica</p>
                        <span class="project-status">En Revisión</span>
                    </div>
                </div>
                <div class="project-card" data-project="Proyecto 2">
                    <div class="project-card-content">
                        <h3>Plataforma E-learning</h3>
                        <p class="project-preview">Plataforma E-learning</p>
                        <span class="project-status">Aprobado</span>
                    </div>
                </div>
                <div class="project-card" data-project="Proyecto 3">
                    <div class="project-card-content">
                        <h3>Sistema de Biblioteca Digital</h3>
                        <p class="project-preview">Sistema de Biblioteca Digital</p>
                        <span class="project-status">En Revisión</span>
                    </div>
                </div>
                <div class="project-card" data-project="Proyecto 4">
                    <div class="project-card-content">
                        <h3>App Móvil Universitaria</h3>
                        <p class="project-preview">App Móvil Universitaria</p>
                        <span class="project-status">Pendiente</span>
                    </div>
                </div>
                <div class="project-card" data-project="Proyecto 5">
                    <div class="project-card-content">
                        <h3>Portal de Investigación</h3>
                        <p class="project-preview">Portal de Investigación</p>
                        <span class="project-status">Aprobado</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel derecho: Detalles del proyecto -->
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

<style>
    .modern-catalog {
        font-family: system-ui, -apple-system, sans-serif;
        background: #f8fafc;
        padding: 1.5rem;
        min-height: calc(100vh - 100px);
    }

    .catalog-container {
        display: grid;
        grid-template-columns: minmax(300px, 2fr) 3fr;
        gap: 2rem;
        max-width: 100%;
        margin: 0 auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        overflow: hidden;
    }

    .panel-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .panel-header h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 1rem;
    }

    .search-box input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.875rem;
        transition: all 0.2s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .projects-panel {
        background: #fff;
        border-right: 1px solid #e2e8f0;
        overflow-y: auto;
    }

    .projects-grid {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .project-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .project-card:hover {
        border-color: #2563eb;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    }

    .project-card.active {
        border-color: #2563eb;
        background: #eff6ff;
    }

    .project-card-content {
        padding: 1rem;
    }

    .project-card h3 {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
    }

    .project-preview {
        font-size: 0.875rem;
        color: #64748b;
        margin-bottom: 0.5rem;
    }

    .project-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        background: #e0f2fe;
        color: #0369a1;
    }

    .project-details-panel {
        padding: 2rem;
        background: #fff;
    }

    .details-placeholder {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        text-align: center;
        padding: 2rem;
    }

    .details-placeholder h3 {
        margin: 1rem 0 0.5rem;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .details-placeholder p {
        font-size: 0.875rem;
    }

    .project-info {
        display: none;
    }

    .project-info.active {
        display: block;
    }

    .info-header {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .info-header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #0f172a;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .info-item {
        background: #f8fafc;
        padding: 1rem;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .info-item label {
        display: block;
        font-size: 0.75rem;
        font-weight: 500;
        color: #64748b;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .info-item p {
        font-size: 0.875rem;
        color: #0f172a;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .catalog-container {
            grid-template-columns: 1fr;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // Datos de los proyectos con información adicional
    const projectData = {
        "Proyecto 1": {
            titulo: "Sistema de Gestión Académica",
            pi: "Juan Pérez",
            invest: "María López",
            asesor: "Carlos Ramírez",
            inversionista: "Ana Martínez",
            estado: "En Revisión",
            fechaInicio: "2024-01-15",
            area: "Desarrollo de Software",
            presupuesto: "$25,000",
            duracion: "8 meses"
        },
        "Proyecto 2": {
            titulo: "Plataforma E-learning",
            pi: "Luis Gómez",
            invest: "Sofía Hernández",
            asesor: "Fernando Torres",
            inversionista: "Laura Gutiérrez",
            estado: "Aprobado",
            fechaInicio: "2024-02-01",
            area: "Educación Digital",
            presupuesto: "$30,000",
            duracion: "12 meses"
        },
        "Proyecto 3": {
            titulo: "Sistema de Biblioteca Digital",
            pi: "Pedro Morales",
            invest: "Lucía Ortiz",
            asesor: "José Navarro",
            inversionista: "Claudia Vega",
            estado: "En Revisión",
            fechaInicio: "2024-01-20",
            area: "Gestión de Información",
            presupuesto: "$18,000",
            duracion: "6 meses"
        },
        "Proyecto 4": {
            titulo: "App Móvil Universitaria",
            pi: "Ricardo Díaz",
            invest: "Patricia Suárez",
            asesor: "Miguel Vázquez",
            inversionista: "Roberto Méndez",
            estado: "Pendiente",
            fechaInicio: "2024-03-01",
            area: "Desarrollo Móvil",
            presupuesto: "$22,000",
            duracion: "7 meses"
        },
        "Proyecto 5": {
            titulo: "Portal de Investigación",
            pi: "Sandra Castillo",
            invest: "Diego Alonso",
            asesor: "Valeria Núñez",
            inversionista: "Andrea Sánchez",
            estado: "Aprobado",
            fechaInicio: "2024-02-15",
            area: "Investigación Académica",
            presupuesto: "$28,000",
            duracion: "10 meses"
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        initializeCatalog();
    });

    function initializeCatalog() {
        const projectCards = document.querySelectorAll('.project-card');

        projectCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remover clase activa de todas las tarjetas
                projectCards.forEach(c => c.classList.remove('active'));

                // Agregar clase activa a la tarjeta seleccionada
                this.classList.add('active');

                // Mostrar detalles del proyecto
                const projectName = this.getAttribute('data-project');
                showProjectDetails(projectName);
            });
        });

        // Inicializar búsqueda
        const searchInput = document.getElementById('searchProjects');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterProjects(searchTerm);
        });
    }

    function showProjectDetails(projectName) {
        const info = projectData[projectName];
        const detailsPanel = document.getElementById('projectDetails');

        detailsPanel.innerHTML = `
        <div class="info-header">
            <h2>${info.titulo}</h2>
            <span class="project-status">${info.estado}</span>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <label>Investigador Principal</label>
                <p>${info.pi}</p>
            </div>
            <div class="info-item">
                <label>Investigador</label>
                <p>${info.invest}</p>
            </div>
            <div class="info-item">
                <label>Asesor</label>
                <p>${info.asesor}</p>
            </div>
            <div class="info-item">
                <label>Inversionista</label>
                <p>${info.inversionista}</p>
            </div>
            <div class="info-item">
                <label>Área</label>
                <p>${info.area}</p>
            </div>
            <div class="info-item">
                <label>Fecha de Inicio</label>
                <p>${info.fechaInicio}</p>
            </div>
            <div class="info-item">
                <label>Presupuesto</label>
                <p>${info.presupuesto}</p>
            </div>
            <div class="info-item">
                <label>Duración</label>
                <p>${info.duracion}</p>
            </div>
        </div>
    `;
    }

    function filterProjects(searchTerm) {
        const cards = document.querySelectorAll('.project-card');
        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const preview = card.querySelector('.project-preview').textContent.toLowerCase();

            if (title.includes(searchTerm) || preview.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    

    // Inicializar el catálogo
    initializeCatalog();

    
</script>