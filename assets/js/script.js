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

/* ------------------------ */
$(document).ready(function () {
    $('#searchBtn').on('click', function () {
        const formData = {
            titleCode: $('#titleCode').val(),
            researchType: $('#researchType').val(),
            researchUnit: $('#researchUnit').val(),
        };

        $.ajax({
            url: 'buscar.php', // Archivo PHP para procesar la búsqueda
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                let rows = '';
                if (response.length > 0) {
                    response.forEach((item, index) => {
                        rows += `<tr>
                            <td>${index + 1}</td>
                            <td>${item.title}</td>
                            <td>${item.researchCenter}</td>
                            <td>${item.date}</td>
                            <td>${item.code}</td>
                            <td>${item.details}</td>
                        </tr>`;
                    });
                } else {
                    rows = `<tr><td colspan="6" class="text-center">No se encontraron resultados</td></tr>`;
                }
                $('#resultsTable').html(rows);
            },
            error: function () {
                alert('Hubo un error al realizar la búsqueda.');
            }
        });
    });
});