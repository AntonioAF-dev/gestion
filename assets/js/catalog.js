// assets/js/catalog.js

document.addEventListener('DOMContentLoaded', function() {
    initializeCatalog();
});

function initializeCatalog() {
    const projectCards = document.querySelectorAll('.project-card');
    
    projectCards.forEach(card => {
        card.addEventListener('click', function() {
            const projectId = this.getAttribute('data-project');
            fetchProjectDetails(projectId);
            
            // Actualizar estado activo
            projectCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Inicializar búsqueda
    const searchInput = document.getElementById('searchProjects');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        filterProjects(searchTerm);
    });
}

function fetchProjectDetails(projectId) {
    fetch(`../api/get_project_details.php?id=${projectId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateProjectDetails(data.project);
            }
        })
        .catch(error => console.error('Error:', error));
}

function updateProjectDetails(project) {
    const detailsPanel = document.getElementById('projectDetails');
    detailsPanel.innerHTML = `
        <div class="info-header">
            <h2>${project.titulo}</h2>
            <span class="project-status">${project.estado}</span>
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
                <p>${project.inversionista || 'No asignado'}</p>
            </div>
            <div class="info-item">
                <label>Área</label>
                <p>${project.area}</p>
            </div>
            <div class="info-item">
                <label>Fecha de Inicio</label>
                <p>${project.fechaInicio}</p>
            </div>
            <div class="info-item">
                <label>Presupuesto</label>
                <p>${project.presupuesto}</p>
            </div>
            <div class="info-item">
                <label>Duración</label>
                <p>${project.duracion}</p>
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