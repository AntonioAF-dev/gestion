/*--------------------*/
window.onscroll = function () {
    var logoNombre = document.getElementById("logo-nombre");
    var navbarContainer = document.getElementById("navbar-container");

    if (window.pageYOffset > 50) {
        logoNombre.style.opacity = "0";
        navbarContainer.style.top = "0";
    } else {
        logoNombre.style.opacity = "1";
        navbarContainer.style.top = "auto";
    }
};

function actualizarHora() {
    const ahora = new Date();
    const horas = ahora.getHours().toString().padStart(2, '0');
    const minutos = ahora.getMinutes().toString().padStart(2, '0');
    const segundos = ahora.getSeconds().toString().padStart(2, '0');
    document.getElementById('hora').textContent = `${horas}:${minutos}:${segundos}`;
}

// Actualiza la hora cada segundo
setInterval(actualizarHora, 1000);

// Llama a la función para mostrar la hora al cargar la página
actualizarHora();

$(document).ready(function () {
    $('.slick-carousel').slick({
        infinite: true,         // Habilita el ciclo infinito
        slidesToShow: 1,        // Solo muestra 1 imagen a la vez
        slidesToScroll: 1,      // Se desplaza de una en una
        autoplay: true,         // Habilita el desplazamiento automático
        autoplaySpeed: 3000,    // Cambia cada 3 segundos
        arrows: true,           // Muestra flechas de navegación
        dots: false             // Oculta los puntos de navegación
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const menuLinks = document.querySelectorAll('.nav-list a');

    menuLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Obtener el archivo destino del atributo data-target
            const target = this.getAttribute('data-target');

            // Realizar la solicitud AJAX para cargar el contenido
            fetch(target)
                .then(response => {
                    if (!response.ok) throw new Error('Error al cargar el contenido');
                    return response.text();
                })
                .then(data => {
                    // Insertar el contenido dinámico en el contenedor
                    document.getElementById('dynamic-content').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error cargando contenido dinámico:', error);
                    document.getElementById('dynamic-content').innerHTML = '<p>Error al cargar contenido.</p>';
                });
        });
    });
});

