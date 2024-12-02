<main class="frontpublic">
    <div id="financiamiento" class="auspiciadores">
        <h2 class="h2-public">Acceso a financiamiento</h2>
        <div class="contenedor-tarjetas">
            <!-- Tarjeta 1 -->
            <div class="tarjeta">
                <div class="contenido-tarjeta">
                    <h3>Proyecto 1: Gestión Digital</h3>
                    <p>Digitalizamos procesos de investigación para mejorar la eficiencia y la transparencia.</p>
                </div>
                <form class="formulario-auspiciador" action="procesar_datos.php" method="POST">
                    <h4>Apoya el proyecto</h4>
                    <label for="nombre1">Nombre:</label>
                    <input type="text" id="nombre1" name="nombre" required placeholder="Tu nombre completo">

                    <label for="correo1">Correo electrónico:</label>
                    <input type="email" id="correo1" name="correo" required placeholder="Tu correo electrónico">

                    <label for="mensaje1">Mensaje:</label>
                    <textarea id="mensaje1" name="mensaje" rows="4" placeholder="¿Cómo te gustaría apoyar el proyecto?"></textarea>

                    <button type="submit">Enviar datos</button>
                </form>
            </div>
            <!-- Tarjeta 2 -->
            <div class="tarjeta">
                <div class="contenido-tarjeta">
                    <h3>Proyecto 2: Innovación Tecnológica</h3>
                    <p>Facilitamos la adopción de nuevas tecnologías en la investigación científica.</p>
                </div>
                <form class="formulario-auspiciador" action="procesar_datos.php" method="POST">
                    <h4>Apoya el proyecto</h4>
                    <label for="nombre2">Nombre:</label>
                    <input type="text" id="nombre2" name="nombre" required placeholder="Tu nombre completo">

                    <label for="correo2">Correo electrónico:</label>
                    <input type="email" id="correo2" name="correo" required placeholder="Tu correo electrónico">

                    <label for="mensaje2">Mensaje:</label>
                    <textarea id="mensaje2" name="mensaje" rows="4" placeholder="¿Cómo te gustaría apoyar el proyecto?"></textarea>

                    <button type="submit">Enviar datos</button>
                </form>
            </div>
            <!-- Tarjeta 3 -->
            <div class="tarjeta">
                <div class="contenido-tarjeta">
                    <h3>Proyecto 3: Redes de Conocimiento</h3>
                    <p>Promovemos la colaboración entre investigadores a nivel global.</p>
                </div>
                <form class="formulario-auspiciador" action="procesar_datos.php" method="POST">
                    <h4>Apoya el proyecto</h4>
                    <label for="nombre3">Nombre:</label>
                    <input type="text" id="nombre3" name="nombre" required placeholder="Tu nombre completo">

                    <label for="correo3">Correo electrónico:</label>
                    <input type="email" id="correo3" name="correo" required placeholder="Tu correo electrónico">

                    <label for="mensaje3">Mensaje:</label>
                    <textarea id="mensaje3" name="mensaje" rows="4" placeholder="¿Cómo te gustaría apoyar el proyecto?"></textarea>

                    <button type="submit">Enviar datos</button>
                </form>
            </div>
        </div>
    </div>

    <div id="recursos" class="recursos-proyecto">
        <h2 class="h2-public">Recursos para Crear tu Proyecto</h2>
        <p>Accede a herramientas y guías que te ayudarán a planificar, ejecutar y financiar tu proyecto de manera eficiente.</p>
        <div class="recursos-contenido">
            <div class="recurso">
                <h3>Recursos de Investigación</h3>
                <p>Aprende a estructurar tu proyecto desde la idea inicial hasta el plan de acción.</p>
                <a href="https://drive.google.com/drive/folders/1OXYMvR4RzAgeZWhZWJbU_KWI5QS2VQwB" class="btn-recurso" target="_blank">Ver Recursos</a>
            </div>
            <div class="recurso">
                <h3>Herramientas de Gestión</h3>
                <p>Explora plataformas y herramientas digitales para organizar tareas y equipos.</p>
                <a href="https://businessmap.io/es/herramientas-de-software-gestion-de-proyectos" class="btn-recurso" target="_blank">Ver Herramientas</a>
            </div>
            <div class="recurso">
                <h3>Fuentes de Financiamiento</h3>
                <p>Descubre opciones de financiamiento para hacer realidad tu proyecto.</p>
                <a href="https://example.com/financiamiento" class="btn-recurso" target="_blank">Más Información</a>
            </div>
        </div>
    </div>

    <div id="biblioteca" class="container3">
        <h2 class="h2-public">Bibliotecas de Asistencia Digital</h2>
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

</main>