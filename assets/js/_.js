




/*---------------------------*/

// Datos de proyectos en proceso
const processProjectData = {
    "ProcesoProyecto1": {
        titulo: "Sistema de Gestión de Laboratorios",
        pi: "Fernando Ruiz",
        invest: "Carmen Torres",
        asesor: "Roberto Sánchez",
        inversionista: "Gabriel Silva",
        estado: "En Proceso",
        fechaInicio: "2023-11-15",
        area: "Gestión Académica",
        presupuesto: "$28,000",
        duracion: "9 meses",
        avance: "70%",
        siguienteMeta: "Implementación de módulo de reservas"
    },
    "ProcesoProyecto2": {
        titulo: "App de Control de Asistencia",
        pi: "Diana López",
        invest: "Mario García",
        asesor: "Laura Martínez",
        inversionista: "Jorge Pérez",
        estado: "En Proceso",
        fechaInicio: "2023-12-01",
        area: "Control Académico",
        presupuesto: "$20,000",
        duracion: "7 meses",
        avance: "45%",
        siguienteMeta: "Desarrollo de interfaz móvil"
    }
};

document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.nav-list li a');

    // Función para cargar contenido
    const loadContent = async (url) => {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const content = await response.text();
            document.getElementById('dynamic-content').innerHTML = content;

            // Si es la vista de proyectos en proceso, inicializar
            if (url.includes('proyectos-proceso')) {
                initializeProcessProjectsView();
            }
        } catch (error) {
            console.error('Error al cargar el contenido:', error);
            document.getElementById('dynamic-content').innerHTML =
                '<p>Error al cargar el contenido. Por favor, intente nuevamente.</p>';
        }
    };

    // Inicializar vista de proyectos en proceso
    function initializeProcessProjectsView() {
        // Inicializar búsqueda
        const searchInput = document.getElementById('searchProjects');
        if (searchInput) {
            searchInput.addEventListener('input', function (e) {
                filterProcessProjects(e.target.value.toLowerCase());
            });
        }

        // Inicializar tarjetas de proyecto
        const projectCards = document.querySelectorAll('.project-card');
        projectCards.forEach(card => {
            card.addEventListener('click', function () {
                // Remover clase activa de todas las tarjetas
                projectCards.forEach(c => c.classList.remove('active'));
                // Agregar clase activa a la tarjeta seleccionada
                this.classList.add('active');

                const projectName = this.getAttribute('data-project');
                showProcessProjectDetails(projectName);
            });
        });
    }

    // Mostrar detalles del proyecto en proceso
    function showProcessProjectDetails(projectName) {
        const project = processProjectData[projectName];
        const detailsPanel = document.getElementById('projectDetails');

        if (detailsPanel && project) {
            detailsPanel.innerHTML = `
                <div class="project-detail-content">
                    <div class="project-header">
                        <h2>${project.titulo}</h2>
                        <div class="progress-container">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: ${project.avance}"></div>
                            </div>
                            <div class="progress-text">
                                ${project.avance} Completado
                            </div>
                        </div>
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
                            <label>Duración</label>
                            <p>${project.duracion}</p>
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

                    <div class="milestone-section">
                        <h3>Siguiente Meta</h3>
                        <div class="milestone-card">
                            <p>${project.siguienteMeta}</p>
                        </div>
                    </div>
                </div>
            `;
        }
    }

    // Filtrar proyectos en proceso
    function filterProcessProjects(searchTerm) {
        const cards = document.querySelectorAll('.project-card');
        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const description = card.querySelector('.card-description').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Eventos del menú
    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            menuItems.forEach(menuItem => menuItem.parentElement.classList.remove('active'));
            this.parentElement.classList.add('active');

            const url = `view/${this.getAttribute('data-target')}.php`;
            loadContent(url);
        });
    });

    // Cargar contenido inicial
    loadContent('view/enviar-proyecto.php');
});

/*--------------------------*/