<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: text/plain; charset=utf-8');

// Conexión a la base de datos
$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'gp';

$conn = new mysqli($server, $user, $pass, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Verificar si el usuario está logueado - usando la variable correcta de sesión
if (!isset($_SESSION['id_usuario'])) {
    echo "Sesión no iniciada";
    exit;
}

// Crear tabla de chat si no existe
$sql = "CREATE TABLE IF NOT EXISTS chat_history (
    id int(11) NOT NULL AUTO_INCREMENT,
    usuario_id int(11) NOT NULL,
    mensaje text NOT NULL,
    es_bot tinyint(1) NOT NULL DEFAULT 0,
    timestamp datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(idusuarios)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$conn->query($sql);


function getRespuesta($mensaje)
{
    $mensaje = mb_strtolower(trim($mensaje));

    $conocimiento = [
        // Saludos y despedidas
        [
            'patrones' => ['hola', 'hi', 'hey', 'buenos dias', 'buenas', 'saludos'],
            'respuestas' => '¡Hola! Estoy aquí para ayudarte con información sobre los proyectos de investigación. ¿En qué puedo asistirte?'
        ],
        [
            'patrones' => ['gracias', 'adios', 'bye', 'hasta luego', 'nos vemos', 'chau'],
            'respuestas' => '¡De nada! Si tienes más preguntas sobre el proceso de presentación de proyectos, no dudes en consultarme.'
        ],

        // Información general sobre proyectos
        [
            'patrones' => ['que es un proyecto', 'definicion de proyecto', 'proyecto significado'],
            'respuestas' => 'Un proyecto de investigación es un plan estructurado que busca resolver un problema o generar conocimiento nuevo mediante la aplicación del método científico.'
        ],
        [
            'patrones' => ['tipos de proyecto', 'clases de proyecto', 'categorias de proyecto'],
            'respuestas' => 'Los principales tipos de proyectos son: investigación básica, investigación aplicada, desarrollo tecnológico, innovación, investigación cualitativa y cuantitativa.'
        ],
        [
            'patrones' => ['como empezar', 'por donde empiezo', 'inicio proyecto'],
            'respuestas' => 'Para iniciar un proyecto, primero identifica un problema o tema de interés, realiza una búsqueda bibliográfica preliminar, define tus objetivos y elabora un cronograma tentativo.'
        ],

        // Elementos del proyecto
        [
            'patrones' => ['proyecto', 'investigación', 'investigacion', 'presentar'],
            'respuestas' => 'Para presentar un proyecto necesitas: título, resumen, introducción, objetivos, metodología, cronograma, presupuesto y referencias bibliográficas.'
        ],
        [
            'patrones' => ['título', 'titulo', 'nombre proyecto'],
            'respuestas' => 'El título del proyecto debe ser claro, conciso y específico. Debe reflejar el objetivo principal y las variables de tu investigación. Evita títulos demasiado largos o ambiguos.'
        ],
        [
            'patrones' => ['resumen', 'abstract', 'sumario'],
            'respuestas' => 'El resumen debe sintetizar en 250-300 palabras: el problema, objetivos, metodología y resultados esperados. Es la carta de presentación de tu proyecto.'
        ],
        [
            'patrones' => ['introduccion', 'contexto', 'antecedentes'],
            'respuestas' => 'La introducción debe presentar el contexto del problema, justificación, antecedentes relevantes y la importancia de tu investigación. Aproximadamente 2-3 páginas.'
        ],
        [
            'patrones' => ['área', 'area', 'tematica', 'temática', 'campo'],
            'respuestas' => 'Las áreas temáticas incluyen: Ciencias Básicas, Ingenierías, Ciencias de la Salud, Ciencias Sociales, Humanidades, etc. Selecciona la que mejor se ajuste a tu investigación.'
        ],
        [
            'patrones' => ['objetivo', 'objetivos', 'meta', 'proposito'],
            'respuestas' => 'Los objetivos deben ser SMART: Específicos, Medibles, Alcanzables, Relevantes y Temporales. Define un objetivo general y 3-4 objetivos específicos.'
        ],
        [
            'patrones' => ['metodologia', 'metodo', 'como investigar'],
            'respuestas' => 'La metodología debe describir: diseño de investigación, población y muestra, instrumentos de recolección de datos, procedimientos y análisis de datos.'
        ],

        // Aspectos metodológicos
        [
            'patrones' => ['muestra', 'poblacion', 'participantes'],
            'respuestas' => 'La muestra debe ser representativa de tu población objetivo. Describe el método de muestreo, criterios de inclusión/exclusión y tamaño muestral con justificación estadística.'
        ],
        [
            'patrones' => ['variables', 'mediciones', 'indicadores'],
            'respuestas' => 'Identifica y define claramente tus variables: dependientes, independientes y de control. Especifica cómo serán medidas y operacionalizadas.'
        ],
        [
            'patrones' => ['instrumentos', 'herramientas', 'tecnicas'],
            'respuestas' => 'Los instrumentos pueden incluir: cuestionarios, entrevistas, observaciones, pruebas estandarizadas, etc. Deben ser válidos y confiables para tu investigación.'
        ],

        // Aspectos formales
        [
            'patrones' => ['formato', 'estilo', 'presentacion'],
            'respuestas' => 'Usa formato académico (APA, Vancouver, etc.), letra Times New Roman 12, espaciado 1.5, márgenes de 2.54 cm. Incluye numeración de páginas y secciones.'
        ],
        [
            'patrones' => ['citas', 'referencias', 'bibliografia'],
            'respuestas' => 'Cita todas las fuentes según el formato requerido. Las referencias deben ser actuales (últimos 5 años) y de fuentes académicas confiables.'
        ],
        [
            'patrones' => ['plagio', 'originalidad', 'turnitin'],
            'respuestas' => 'Todo proyecto debe ser original. Cita adecuadamente las fuentes y usa herramientas antiplagio. El índice de similitud no debe superar el 25%.'
        ],

        // Cronograma y presupuesto
        [
            'patrones' => ['cronograma', 'tiempo', 'duracion', 'plazos'],
            'respuestas' => 'Elabora un cronograma realista usando un diagrama de Gantt. Incluye todas las actividades desde la revisión bibliográfica hasta la presentación final.'
        ],
        [
            'patrones' => ['presupuesto', 'costos', 'gastos', 'financiamiento'],
            'respuestas' => 'El presupuesto debe detallar: recursos humanos, materiales, equipos, servicios y otros gastos. Incluye justificación para cada rubro.'
        ],

        // Aspectos éticos
        [
            'patrones' => ['etica', 'consentimiento', 'permisos'],
            'respuestas' => 'Todo proyecto debe cumplir principios éticos: consentimiento informado, confidencialidad, minimización de riesgos. Obtén aprobación del comité de ética si es necesario.'
        ],

        // Proceso de revisión
        [
            'patrones' => ['revision', 'evaluacion', 'aprobacion'],
            'respuestas' => 'Tu proyecto será evaluado por expertos en el área. Criterios: relevancia, metodología, factibilidad, aspectos éticos y formato.'
        ],
        [
            'patrones' => ['correcciones', 'observaciones', 'cambios'],
            'respuestas' => 'Las observaciones deben atenderse en un plazo máximo de 15 días. Documenta todos los cambios realizados en una carta de respuesta.'
        ],

        // Resultados y publicación
        [
            'patrones' => ['resultados', 'hallazgos', 'analisis'],
            'respuestas' => 'Presenta los resultados de forma clara y objetiva. Usa tablas y gráficos apropiados. Interpreta los hallazgos en relación con tus objetivos.'
        ],
        [
            'patrones' => ['publicacion', 'difusion', 'revista'],
            'respuestas' => 'Considera publicar tus resultados en revistas indexadas. Verifica los requisitos de la revista y prepara tu manuscrito según sus normas.'
        ],

        // Aspectos específicos
        [
            'patrones' => ['hipotesis', 'prediccion', 'supuesto'],
            'respuestas' => 'La hipótesis debe ser clara, comprobable y derivada de tu marco teórico. Puede ser nula o alternativa, según tu diseño de investigación.'
        ],
        [
            'patrones' => ['marco teorico', 'revision literatura', 'estado arte'],
            'respuestas' => 'El marco teórico debe presentar teorías relevantes, estudios previos y conceptos clave. Organízalo de lo general a lo específico.'
        ],
        [
            'patrones' => ['analisis estadistico', 'estadistica', 'datos'],
            'respuestas' => 'Especifica los métodos estadísticos a usar: descriptivos, inferenciales, paramétricos o no paramétricos. Justifica tu elección.'
        ],

        // Soporte y recursos
        [
            'patrones' => ['ayuda', 'apoyo', 'asesoria'],
            'respuestas' => 'Puedes solicitar asesoría con profesores expertos en tu área. También hay talleres y recursos en línea disponibles.'
        ],
        [
            'patrones' => ['software', 'programas', 'herramientas'],
            'respuestas' => 'Programas útiles: SPSS/R para estadística, Mendeley/Zotero para referencias, Atlas.ti/NVivo para análisis cualitativo.'
        ],
        [
            'patrones' => ['becas', 'financiamiento', 'apoyo economico'],
            'respuestas' => 'Hay becas disponibles para investigación. Consulta las convocatorias vigentes y sus requisitos en la oficina de investigación.'
        ],

        // Aspectos prácticos
        [
            'patrones' => ['consejos', 'recomendaciones', 'tips'],
            'respuestas' => 'Recomendaciones clave: mantén un registro detallado, haz respaldos frecuentes, establece plazos realistas y mantén comunicación constante con tu asesor.'
        ],
        [
            'patrones' => ['problemas comunes', 'errores', 'dificultades'],
            'respuestas' => 'Errores frecuentes: objetivos mal definidos, metodología inadecuada, muestra insuficiente, análisis estadístico incorrecto, mala redacción.'
        ],

        // Requisitos específicos
        [
            'patrones' => ['requisitos', 'necesito', 'documentos'],
            'respuestas' => 'Requisitos: proyecto en formato establecido, carta de compromiso, CV del investigador, presupuesto detallado, cronograma y permisos necesarios.'
        ],

        // Impacto y resultados esperados
        [
            'patrones' => ['impacto', 'resultados', 'esperados', 'beneficios'],
            'respuestas' => 'Describe el impacto esperado en términos académicos, sociales y/o económicos. Incluye beneficiarios directos e indirectos de tu investigación.'
        ]
    ];

    foreach ($conocimiento as $item) {
        foreach ($item['patrones'] as $patron) {
            if (strpos($mensaje, $patron) !== false) {
                return $item['respuestas'];
            }
        }
    }

    return "Puedo ayudarte con información sobre la presentación de proyectos de investigación. ¿Te gustaría saber sobre algún aspecto específico como el título, objetivos, metodología o requisitos?";
}

// Guardar mensaje en la base de datos
function saveMessage($conn, $userId, $mensaje, $esBot)
{
    $stmt = $conn->prepare("INSERT INTO chat_history (usuario_id, mensaje, es_bot) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $userId, $mensaje, $esBot);
    return $stmt->execute();
}

// Obtener historial de mensajes
function getMessageHistory($conn, $userId)
{
    $messages = [];
    $sql = "SELECT mensaje, es_bot, UNIX_TIMESTAMP(timestamp) as timestamp 
            FROM chat_history 
            WHERE usuario_id = ? 
            ORDER BY timestamp ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $messages[] = [
            'timestamp' => $row['timestamp'],
            'user' => $row['es_bot'] ? null : $row['mensaje'],
            'bot' => $row['es_bot'] ? $row['mensaje'] : null
        ];
    }

    return $messages;
}

if (isset($_POST['message'])) {
    $userMessage = strip_tags(trim($_POST['message']));
    $botResponse = getRespuesta($userMessage);

    // Guardar mensaje del usuario - usando la variable correcta de sesión
    saveMessage($conn, $_SESSION['id_usuario'], $userMessage, 0);

    // Guardar respuesta del bot
    saveMessage($conn, $_SESSION['id_usuario'], $botResponse, 1);

    echo $botResponse;
    exit;
}

if (isset($_POST['get_history'])) {
    header('Content-Type: application/json');
    $history = getMessageHistory($conn, $_SESSION['id_usuario']);
    echo json_encode($history);
    exit;
}

$conn->close();
