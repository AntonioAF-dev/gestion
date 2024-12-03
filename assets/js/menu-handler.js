// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los enlaces del menú
    const menuLinks = document.querySelectorAll('.nav-list li a');
    
    // Agregar evento click a cada enlace
    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remover clase activa de todos los elementos
            menuLinks.forEach(item => {
                item.parentElement.classList.remove('active');
            });
            
            // Agregar clase activa al elemento clickeado
            this.parentElement.classList.add('active');
            
            // Obtener la ruta del archivo a cargar
            const target = this.getAttribute('data-target');
            
            // Si el target no incluye .php, agregarlo
            const filePath = target.includes('.php') ? target : `view/${target}.php`;
            
            // Cargar el contenido usando AJAX
            fetch(filePath)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    // Insertar el contenido en el div
                    document.getElementById('dynamic-content').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error cargando el contenido:', error);
                    document.getElementById('dynamic-content').innerHTML = 'Error al cargar el contenido';
                });
        });
    });
    
    // Activar el primer elemento por defecto (Enviar)
    document.querySelector('#enviar-proyectos a').click();
});