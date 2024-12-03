<div class="modern-catalog">
    <div class="catalog-container">
        <!-- Panel izquierdo: Lista de proyectos -->
        <div class="projects-panel">
            <div class="panel-header">
                <h2>Proyectos Terminados</h2>
                <div class="search-box">
                    <input type="text" id="searchProjects" placeholder="Buscar proyecto terminado...">
                </div>
            </div>
            <div class="projects-grid" id="projectsList">
                <div class="project-card" data-project="TerminadoProyecto1">
                    <div class="project-card-content">
                        <h3>Sistema de Matrícula Digital</h3>
                        <p class="project-preview">Implementación exitosa en todas las facultades</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Dic 2023
                            </span>
                        </div>
                    </div>
                </div>
                <div class="project-card" data-project="TerminadoProyecto2">
                    <div class="project-card-content">
                        <h3>Portal de Egresados</h3>
                        <p class="project-preview">Plataforma de seguimiento de graduados</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Dic 2023
                            </span>
                        </div>
                    </div>
                </div>
                <div class="project-card" data-project="TerminadoProyecto3">
                    <div class="project-card-content">
                        <h3>Digitalización de Biblioteca</h3>
                        <p class="project-preview">Acceso en línea a todos los recursos bibliográficos</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Nov 2023
                            </span>
                        </div>
                    </div>
                </div>
                <div class="project-card" data-project="TerminadoProyecto4">
                    <div class="project-card-content">
                        <h3>Sistema de Admisión en Línea</h3>
                        <p class="project-preview">Proceso de postulación 100% digital</p>
                        <span class="project-status completed">Completado</span>
                        <div class="project-meta">
                            <span class="meta-item">
                                <i class="fa fa-calendar"></i>
                                Oct 2023
                            </span>
                        </div>
                    </div>
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .projects-panel {
            background: #fff;
            border-right: 1px solid #e2e8f0;
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
        }

        .search-box input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .projects-grid {
            padding: 1rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 0.75rem;
        }

        .project-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .project-status.completed {
            background-color: #dcfce7;
            color: #059669;
        }

        .project-meta {
            margin-top: 0.75rem;
            display: flex;
            gap: 1rem;
            font-size: 0.75rem;
            color: #64748b;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
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

        .info-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
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

        .results-section {
            background: #f8fafc;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .results-section h3 {
            font-size: 1.125rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .impact-metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .metric-card {
            background: #fff;
            padding: 1rem;
            border-radius: 6px;
            text-align: center;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .metric-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 0.5rem;
        }

        .metric-label {
            font-size: 0.875rem;
            color: #64748b;
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
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar la búsqueda
            const searchInput = document.getElementById('searchProjects');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
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
                });
            }

            // Inicializar las tarjetas de proyecto
            const projectCards = document.querySelectorAll('.project-card');
            projectCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remover clase activa de todas las tarjetas
                    projectCards.forEach(c => c.classList.remove('active'));
                    // Agregar clase activa a la tarjeta seleccionada
                    this.classList.add('active');

                    // Mostrar detalles del proyecto
                    const projectName = this.getAttribute('data-project');
                    const project = projectData[projectName];

                    const detailsPanel = document.getElementById('projectDetails');
                    detailsPanel.innerHTML = `
                <div class="info-header">
                    <h2>${project.titulo}</h2>
                    <span class="project-status completed">Completado</span>
                </div>
                
                <div class="info-grid">
                    <div class="info-item">
                        <label>Investigador Principal</label>
                        <p>${project.pi}</p>
                    </div>
                    <div class="info-item">
                        <label>Investigador</label>
                        <p>${project.invest}</p>
                    </div>
                    <div class="info-item">
                        <label>Asesor</label>
                        <p>${project.asesor}</p>
                    </div>
                    <div class="info-item">
                        <label>Inversionista</label>
                        <p>${project.inversionista}</p>
                    </div>
                    <div class="info-item">
                        <label>Fecha de Inicio</label>
                        <p>${project.fechaInicio}</p>
                    </div>
                    <div class="info-item">
                        <label>Fecha de Finalización</label>
                        <p>${project.fechaFin}</p>
                    </div>
                    <div class="info-item">
                        <label>Área</label>
                        <p>${project.area}</p>
                    </div>
                    <div class="info-item">
                        <label>Presupuesto</label>
                        <p>${project.presupuesto}</p>
                    </div>
                </div>

                <div class="results-section">
                    <h3>Resultados del Proyecto</h3>
                    <div class="info-item">
                        <label>Resultado Final</label>
                        <p>${project.resultado}</p>
                    </div>
                    <div class="impact-metrics">
                        <div class="metric-card">
                            <div class="metric-value">${project.impacto}</div>
                            <div class="metric-label">Impacto del Proyecto</div>
                        </div>
                    </div>
                </div>
            `;
                });
            });
        });
    </script>