document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los elementos del menú
    const menuItems = document.querySelectorAll('.nav-list li a');

    // Función para cargar el contenido
    const loadContent = async (url) => {
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const content = await response.text();
            document.getElementById('dynamic-content').innerHTML = content;

            // Si el contenido cargado es el de proyectos catalogados, inicializar su JavaScript
            if (url.includes('proyecto_catalogado')) {
                // Reinicializar el comportamiento de los botones de proyecto
                initializeProjectButtons();
            }
        } catch (error) {
            console.error('Error al cargar el contenido:', error);
            document.getElementById('dynamic-content').innerHTML =
                '<p>Error al cargar el contenido. Por favor, intente nuevamente.</p>';
        }
    };

    // Función para inicializar los botones de proyecto
    function initializeProjectButtons() {
        if (typeof showProjectInfo === 'function') {
            const projectButtons = document.querySelectorAll('.projects-list button');
            projectButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    const projectName = e.target.textContent;
                    showProjectInfo(projectName);
                });
            });
        }
    }

    // Agrega el evento click a cada elemento del menú
    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Remueve la clase activa de todos los elementos
            menuItems.forEach(menuItem => {
                menuItem.parentElement.classList.remove('active');
            });

            // Agrega la clase activa al elemento clickeado
            this.parentElement.classList.add('active');

            // Obtiene la URL del atributo data-target
            const targetUrl = this.getAttribute('data-target');

            // Construye la ruta correcta
            const url = `view/${targetUrl}.php`;

            // Carga el contenido
            loadContent(url);
        });
    });

    // Carga el contenido inicial (Enviar Proyecto)
    loadContent('view/enviar-proyecto.php');
});

// Espera a que el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los elementos del menú
    const menuItems = document.querySelectorAll('.nav-list li a');

    // Datos de los proyectos
    const projectData = {
        // Proyectos Catalogados
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
            fechaInicio: "2024-02-15",
            area: "Gestión Documental",
            presupuesto: "$22,000",
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
            presupuesto: "$18,000",
            duracion: "5 meses"
        },
        "Proyecto 5": {
            titulo: "Portal de Investigación",
            pi: "Sandra Castillo",
            invest: "Diego Alonso",
            asesor: "Valeria Núñez",
            inversionista: "Andrea Sánchez",
            estado: "Aprobado",
            fechaInicio: "2024-01-20",
            area: "Investigación",
            presupuesto: "$35,000",
            duracion: "10 meses"
        },
    };

    // Función para inicializar el catálogo de proyectos
    function initializeProjectCatalog() {
        const projectCards = document.querySelectorAll('.project-card');
        if (projectCards.length > 0) {
            projectCards.forEach(card => {
                card.addEventListener('click', function () {
                    const projectName = this.getAttribute('data-project');
                    showProjectDetails(projectName);

                    // Remover clase activa de todas las tarjetas
                    projectCards.forEach(c => c.classList.remove('active'));
                    // Agregar clase activa a la tarjeta seleccionada
                    this.classList.add('active');
                });
            });

            // Inicializar búsqueda si existe el campo
            const searchInput = document.getElementById('searchProjects');
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    filterProjects(this.value.toLowerCase());
                });
            }
        }
    }

    // Función para mostrar detalles del proyecto
    function showProjectDetails(projectName) {
        const info = projectData[projectName];
        const detailsPanel = document.getElementById('projectDetails');
        if (detailsPanel && info) {
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
    }

    // Función para filtrar proyectos
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

    // Función para cargar el contenido
    const loadContent = async (url) => {
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const content = await response.text();
            document.getElementById('dynamic-content').innerHTML = content;

            // Inicializar el catálogo si se cargó la vista de proyectos
            if (url.includes('proyecto_catalogado')) {
                initializeProjectCatalog();
            }
        } catch (error) {
            console.error('Error al cargar el contenido:', error);
            document.getElementById('dynamic-content').innerHTML =
                '<p>Error al cargar el contenido. Por favor, intente nuevamente.</p>';
        }
    };

    // Agrega el evento click a cada elemento del menú
    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Remueve la clase activa de todos los elementos
            menuItems.forEach(menuItem => {
                menuItem.parentElement.classList.remove('active');
            });

            // Agrega la clase activa al elemento clickeado
            this.parentElement.classList.add('active');

            // Obtiene la URL del atributo data-target
            const targetUrl = this.getAttribute('data-target');

            // Construye la ruta correcta
            const url = `view/${targetUrl}.php`;

            // Carga el contenido
            loadContent(url);
        });
    });



    // Carga el contenido inicial
    loadContent('view/enviar-proyecto.php');
});
