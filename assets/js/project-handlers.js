// Datos de proyectos
const projectData = {
    "Proyecto 1": {
        titulo: "Sistema de Gestión Académica",
        description: "Sistema de Gestión Académica",
        estado: "En Revisión",
        pi: "Juan Pérez",
        invest: "María López",
        asesor: "Carlos Ramírez",
        inversionista: "Ana Martínez",
        fechaInicio: "2024-01-15",
        area: "Desarrollo de Software",
        presupuesto: "$25,000",
        duracion: "8 meses"
    },
    "Proyecto 2": {
        titulo: "Plataforma E-learning",
        description: "Plataforma E-learning",
        estado: "Aprobado",
        // ... resto de datos
    }
    // ... más proyectos
};

// Función para inicializar la vista de proyectos
function initializeProjectView() {
    const searchInput = document.querySelector('input[placeholder="Buscar proyecto..."]');
    const projectItems = document.querySelectorAll('.project-item');

    // Inicializar búsqueda
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterProjects(searchTerm);
        });
    }

    // Inicializar clicks en proyectos
    projectItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remover selección previa
            projectItems.forEach(p => p.classList.remove('selected'));
            // Agregar selección actual
            this.classList.add('selected');
            
            // Obtener y mostrar detalles del proyecto
            const projectName = this.querySelector('h3').textContent;
            showProjectDetails(projectName);
        });
    });
}

// Función para filtrar proyectos
function filterProjects(searchTerm) {
    const projectItems = document.querySelectorAll('.project-item');
    projectItems.forEach(item => {
        const title = item.querySelector('h3').textContent.toLowerCase();
        const description = item.querySelector('p').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Función para mostrar detalles del proyecto
function showProjectDetails(projectName) {
    const project = projectData[projectName];
    const detailsContainer = document.getElementById('projectDetails');
    
    if (!project || !detailsContainer) return;

    detailsContainer.innerHTML = `
        <div class="project-details-header">
            <h2>${project.titulo}</h2>
            <span class="status-badge ${project.estado.toLowerCase().replace(' ', '-')}">
                ${project.estado}
            </span>
        </div>
        
        <div class="project-details-content">
            <div class="detail-item">
                <span class="label">Investigador Principal:</span>
                <span class="value">${project.pi}</span>
            </div>
            <div class="detail-item">
                <span class="label">Investigador:</span>
                <span class="value">${project.invest}</span>
            </div>
            <div class="detail-item">
                <span class="label">Asesor:</span>
                <span class="value">${project.asesor}</span>
            </div>
            <div class="detail-item">
                <span class="label">Inversionista:</span>
                <span class="value">${project.inversionista}</span>
            </div>
            <div class="detail-item">
                <span class="label">Fecha de Inicio:</span>
                <span class="value">${project.fechaInicio}</span>
            </div>
            <div class="detail-item">
                <span class="label">Área:</span>
                <span class="value">${project.area}</span>
            </div>
            <div class="detail-item">
                <span class="label">Presupuesto:</span>
                <span class="value">${project.presupuesto}</span>
            </div>
            <div class="detail-item">
                <span class="label">Duración:</span>
                <span class="value">${project.duracion}</span>
            </div>
        </div>
    `;
}

// Estilos adicionales específicos
const styles = `
    .project-item {
        padding: 15px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .project-item:hover {
        background-color: #f9fafb;
        border-color: #3b82f6;
    }

    .project-item.selected {
        background-color: #eff6ff;
        border-color: #3b82f6;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge.en-revision {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-badge.aprobado {
        background-color: #d1fae5;
        color: #065f46;
    }

    .status-badge.pendiente {
        background-color: #e0f2fe;
        color: #0369a1;
    }

    .project-details-header {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e5e7eb;
    }

    .project-details-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }

    .detail-item {
        padding: 10px;
        background-color: #f9fafb;
        border-radius: 6px;
    }

    .detail-item .label {
        display: block;
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 4px;
    }

    .detail-item .value {
        font-weight: 500;
        color: #111827;
    }
`;

// Agregar estilos al documento
const styleSheet = document.createElement("style");
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', initializeProjectView);