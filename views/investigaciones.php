<main>
    <div class="container2">
        <h1>PROYECTOS</h1>
        <form id="searchForm">
            <div class="row">
                <input type="text" id="titleCode" class="form-control" placeholder="Título o Código">
                <select id="researchType" class="form-select">
                    <option value="ALL">Tipo de investigación (TODOS)</option>
                    <option value="Tipo1">Tesis</option>
                    <option value="Tipo2">Bachiller</option>
                </select>
                <select id="researchUnit" class="form-select">
                    <option value="ALL">Unidad de Investigación (TODOS)</option>
                    <option value="Unidad1">ING</option>
                    <option value="Unidad2">DERECHO</option>
                </select>
                <button type="button" class="btn" id="searchBtn">Buscar</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Título</th>
                    <th>Centro de Investigación</th>
                    <th>Fecha</th>
                    <th>Código</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody id="resultsTable">
                <tr>
                    <td colspan="6" class="text-center">Haga clic en buscar para encontrar alguna coincidencia</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container3">
        <h1>Bibliotecas</h1>
        <div class="card-grid">
            <?php
            // Simulación de datos (puedes reemplazar esto con datos de una base de datos)
            $bibliotecas = [
                ["id" => 1, "nombre" => "Biblioteca Central", "descripcion" => "La biblioteca principal de la ciudad.", "url" => "https://biblioteca.udh.edu.pe/online/index.php?busqueda=c%2B%2B&filtro=titulo&sede=02&Submit=Buscar+Libro"],
                ["id" => 2, "nombre" => "Biblioteca Digital", "descripcion" => "Recursos en línea y libros digitales.", "url" => "https://ebooks.editorialmacro.com/library"],
                ["id" => 3, "nombre" => "Biblioteca Infantil", "descripcion" => "Especializada en libros para niños.", "url" => "https://www.cervantesvirtual.com/portales/biblioteca_literatura_infantil_juvenil/"],
                ["id" => 4, "nombre" => "Biblioteca Universitaria", "descripcion" => "Apoyo académico para estudiantes.", "url" => "https://repositorio.udh.edu.pe/"],
                ["id" => 5, "nombre" => "Biblioteca Pública Norte", "descripcion" => "Acceso libre para todos.", "url" => "https://www.cervantesvirtual.com/"],
                ["id" => 6, "nombre" => "Biblioteca Sur", "descripcion" => "Espacio cultural y educativo.", "url" => "https://example.com/sur"],
                ["id" => 7, "nombre" => "Biblioteca Comunitaria", "descripcion" => "Fomenta la lectura en la comunidad.", "url" => "https://www.bidi.unam.mx/"],
                ["id" => 8, "nombre" => "Biblioteca Histórica", "descripcion" => "Documentos históricos y colecciones únicas.", "url" => "https://www.cervantesvirtual.com/"],
                ["id" => 9, "nombre" => "Biblioteca Tecnológica", "descripcion" => "Especializada en tecnología e innovación.", "url" => "https://biblioteca.concytec.gob.pe/"]
            ];

            foreach ($bibliotecas as $biblioteca) {
                echo '
                        <div class="card">
                            <h3>' . htmlspecialchars($biblioteca["nombre"]) . '</h3>
                            <p>' . htmlspecialchars($biblioteca["descripcion"]) . '</p>
                            <a href="' . htmlspecialchars($biblioteca["url"]) . '" target="_blank" class="btn">Ver más</a>
                        </div>
                    ';
            }
            ?>
        </div>
    </div>

    <h2>Últimas Publicaciones de Investigación</h2>
    <div class="container publicaciones">
        <div class="publicacion-grid">
            <?php
            // Simulación de datos (puedes reemplazar esto con datos de una base de datos)
            $publicaciones = [
                ["id" => 1, "titulo" => "Impacto del cambio climático en la biodiversidad", "fecha" => "2024-11-15", "url" => "https://repositorio.cepal.org/server/api/core/bitstreams/df277d47-47a1-4466-84a4-82ee62adad54/content", "resumen" => "Un análisis detallado sobre el efecto del cambio climático en los ecosistemas globales."],
                ["id" => 2, "titulo" => "Avances en inteligencia artificial y su impacto social", "fecha" => "2024-11-10", "url" => "https://repository.upb.edu.co/bitstream/handle/20.500.11912/4942/Inteligencia%20artificial%20impacto%20social.pdf?sequence=1&isAllowed=y", "resumen" => "Explorando cómo la IA está moldeando la sociedad moderna."],
                ["id" => 3, "titulo" => "Energías renovables: Retos y oportunidades", "fecha" => "2024-11-05", "url" => "https://www.ulima.edu.pe/alvaro-porturas-01-05-2024", "resumen" => "Una mirada al futuro de las energías sostenibles."],
                ["id" => 4, "titulo" => "Nanotecnología en la medicina moderna", "fecha" => "2024-11-01", "url" => "https://www.aetsa.org/download/publicaciones/antiguas/AETSA_2007-02_F2_Nanomedicina.pdf", "resumen" => "Los últimos avances en nanotecnología aplicada a tratamientos médicos."],
                ["id" => 5, "titulo" => "Economía circular en el siglo XXI", "fecha" => "2024-10-25", "url" => "https://bdigital.uncu.edu.ar/14316", "resumen" => "Cómo la economía circular está transformando las industrias."],
                ["id" => 6, "titulo" => "Exploración espacial: el siguiente capítulo", "fecha" => "2024-10-20", "url" => "https://www.bbc.com/mundo/noticias/2011/07/110708_eeuu_futuro_vuelos_espacio_tripulados_wbm", "resumen" => "Nuevas fronteras en la exploración del espacio exterior."]
            ];

            foreach ($publicaciones as $publicacion) {
                echo '
                    <div class="publicacion-card">
                        <h3>' . htmlspecialchars($publicacion["titulo"]) . '</h3>
                        <p class="fecha"><strong>Fecha:</strong> ' . htmlspecialchars($publicacion["fecha"]) . '</p>
                        <p class="resumen">' . htmlspecialchars($publicacion["resumen"]) . '</p>
                        <a href="' . htmlspecialchars($publicacion["url"]) . '" target="_blank" class="btn-publicacion">Leer más</a>
                    </div>
                ';
            }
            ?>
        </div>
    </div>
</main>