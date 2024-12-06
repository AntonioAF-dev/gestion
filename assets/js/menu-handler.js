// Manejador principal del sistema
const AppHandler = {
    init() {
        this.initializeMenu();
        this.initializeProjects();
    },

    // Inicializar menú y carga de contenido dinámico
    initializeMenu() {
        const menuItems = document.querySelectorAll('.nav-list li a');
        
        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Actualizar estado activo del menú
                menuItems.forEach(menuItem => menuItem.parentElement.classList.remove('active'));
                item.parentElement.classList.add('active');
                
                // Cargar contenido
                const targetUrl = item.getAttribute('data-target');
                const url = `view/${targetUrl}.php`;
                this.loadContent(url);
            });
        });

        // Cargar contenido inicial
        this.loadContent('view/enviar-proyecto.php');
    },

    // Cargar contenido dinámicamente
    async loadContent(url) {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            
            const content = await response.text();
            document.getElementById('dynamic-content').innerHTML = content;
            
            // Inicializar funcionalidades después de cargar el contenido
            if (url.includes('proyecto_catalogado')) {
                this.initializeProjects();
            } else if (url.includes('proyectos-proceso')) {
                this.initializeProjects();
            } else if (url.includes('proyectos-terminados')) {
                this.initializeProjects();
            } else if (url.includes('proyectos-publicados')) {
                this.initializeProjects();
            }
        } catch (error) {
            console.error('Error al cargar el contenido:', error);
            document.getElementById('dynamic-content').innerHTML = 
                '<p>Error al cargar el contenido. Por favor, intente nuevamente.</p>';
        }
    },

    // Inicializar funcionalidades de proyectos
    initializeProjects() {
        this.attachCardListeners();
        this.attachSearchListeners();
    },

    // Agregar listeners a las tarjetas de proyecto
    attachCardListeners() {
        const projectCards = document.querySelectorAll('.project-card');
        if (projectCards.length > 0) {
            projectCards.forEach(card => {
                card.addEventListener('click', () => {
                    this.handleCardClick(card);
                });
            });
        }
    },

    // Manejar clic en tarjeta
    handleCardClick(card) {
        document.querySelectorAll('.project-card').forEach(c => c.classList.remove('active'));
        card.classList.add('active');
        
        const projectId = card.getAttribute('data-project');
        this.showProjectDetails(projectId);
    },

    // Mostrar detalles del proyecto
    showProjectDetails(projectId) {
        const project = projectData[projectId];
        if (!project) return;

        const detailsPanel = document.getElementById('projectDetails');
        if (!detailsPanel) return;

        detailsPanel.innerHTML = this.getDetailsTemplate(project);
    },

    // Template para detalles
    getDetailsTemplate(project) {
        return `
            <div class="info-header">
                <h2>${project.titulo}</h2>
                <span class="project-status">${project.estado}</span>
                ${this.getProgressBar(project)}
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <label>Investigador Principal</label>
                    <p>${project.pi}</p>
                </div>
                <!-- ... resto de los campos ... -->
            </div>
        `;
    },

    // Manejar búsqueda
    attachSearchListeners() {
        const searchInput = document.getElementById('searchProjects');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                this.filterProjects(searchTerm);
            });
        }
    },

    // Filtrar proyectos
    filterProjects(searchTerm) {
        const cards = document.querySelectorAll('.project-card');
        cards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('.project-preview').textContent.toLowerCase();
            card.style.display = (title.includes(searchTerm) || description.includes(searchTerm)) 
                ? 'block' 
                : 'none';
        });
    }
};

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    AppHandler.init();
});