// Manejador principal del sistema
const AppHandler = {
    init() {
        this.initializeMenu();
        this.initializeProjects();
        this.attachSearchListeners();
        this.initializeCatalog();
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
        // Modificar para usar la estructura actual de las tarjetas
        const projectItems = document.querySelectorAll('.proyecto-item');
        projectItems.forEach(item => {
            item.addEventListener('click', () => {
                this.handleProjectClick(item);
            });
        });

        // También manejar los elementos con estructura alternativa
        const projectCards = document.querySelectorAll('[data-project]');
        projectCards.forEach(card => {
            card.addEventListener('click', () => {
                this.handleProjectClick(card);
            });
        });
    },

    handleProjectClick(element) {
        // Obtener datos del proyecto del elemento clickeado
        const title = element.querySelector('h3')?.textContent ||
            element.querySelector('div:first-child')?.textContent;
        const description = element.querySelector('p')?.textContent ||
            element.querySelector('div:nth-child(2)')?.textContent;
        const status = element.querySelector('.project-status')?.textContent ||
            element.querySelector('[class*="En"]')?.textContent ||
            element.querySelector('[class*="Aprobado"]')?.textContent ||
            element.querySelector('[class*="Pendiente"]')?.textContent;
        const date = element.querySelector('[class*="fecha"]')?.textContent ||
            element.querySelector('time')?.textContent ||
            element.querySelector('.meta-item')?.textContent;

        this.showProjectDetails({
            titulo: title,
            descripcion: description,
            estado: status,
            fecha: date,
            // ... otros campos que puedas extraer
        });
    },

    showProjectDetails(project) {
        const detailsContainer = document.querySelector('.project-details') ||
            document.getElementById('projectDetails');

        if (!detailsContainer) return;

        detailsContainer.innerHTML = `
            <div class="detail-content">
                <h2>${project.titulo}</h2>
                <div class="detail-status">${project.estado}</div>
                <div class="detail-info">
                    <p><strong>Descripción:</strong> ${project.descripcion}</p>
                    <p><strong>Fecha:</strong> ${project.fecha}</p>
                </div>
                ${this.getAdditionalProjectInfo(project)}
            </div>
        `;
    },

    getAdditionalProjectInfo(project) {
        // Aquí puedes agregar información adicional según el tipo de proyecto
        if (project.estado.includes('En Revisión')) {
            return `
                <div class="review-info">
                    <h3>Estado de Revisión</h3>
                    <p>El proyecto está siendo evaluado por el comité correspondiente.</p>
                </div>
            `;
        }
        if (project.estado === 'Aprobado') {
            return `
                <div class="approved-info">
                    <h3>Proyecto Aprobado</h3>
                    <p>El proyecto ha sido aprobado y está listo para su implementación.</p>
                </div>
            `;
        }
        return '';
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
                console.log('Término de búsqueda:', searchTerm); // Agregar esta línea
                this.filterProjects(searchTerm);
            });
        }
    },

    // Filtrar proyectos
    filterProjects(searchTerm) {
        const cards = document.querySelectorAll('.project-card, .proyecto-item');
        cards.forEach(card => {
            const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
            const description = card.querySelector('.project-preview, p')?.textContent.toLowerCase() || '';
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

// Reinicializar después de cargas dinámicas
document.addEventListener('contentLoaded', () => {
    AppHandler.initializeProjects();
});