<?php
// survey.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar los datos enviados por el formulario
    $calidad = $_POST['calidad'] ?? null;
    $claridad = $_POST['claridad'] ?? null;
    $respuesta = $_POST['respuesta'] ?? null;
    $atencion = $_POST['atencion'] ?? null;
    $resultados = $_POST['resultados'] ?? null;
    $soporte = $_POST['soporte'] ?? null;
    $comentarios = trim($_POST['comentarios'] ?? '');

    // Aquí puedes manejar los datos, como almacenarlos en una base de datos o enviarlos por correo
    $mensaje = "Gracias por completar la encuesta. Tus respuestas han sido registradas.";

    // Opcional: Redirigir o mostrar un mensaje de confirmación
    echo "<div style='text-align:center;padding:20px;background-color:#007bff;color:#fff;'>$mensaje</div>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Satisfacción</title>
    <link rel="stylesheet" href="assets/css/transferencia.css">
</head>

<body class="encuestas-body">
    <header class="header-en">
        <h1 class="headh1">Encuesta de Satisfacción</h1>
        <p class="ph1-2">Tu opinión nos ayuda a mejorar nuestros servicios tecnológicos</p>
    </header>
    <main class="main-encuesta">
        <form class="survey-form" method="POST" action="survey.php">
            <div class="question">
                <label>¿Qué tan satisfecho está con la calidad de los servicios de transferencia tecnológica ofrecidos?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="calidad" value="<?= $i ?>" id="calidad<?= $i ?>" required>
                        <label for="calidad<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Qué tan satisfecho está con la claridad de la información proporcionada?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="claridad" value="<?= $i ?>" id="claridad<?= $i ?>" required>
                        <label for="claridad<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Qué tan satisfecho está con el tiempo de respuesta del equipo encargado?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="respuesta" value="<?= $i ?>" id="respuesta<?= $i ?>" required>
                        <label for="respuesta<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Qué tan satisfecho está con la atención brindada durante el proceso?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="atencion" value="<?= $i ?>" id="atencion<?= $i ?>" required>
                        <label for="atencion<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Qué tan satisfecho está con los resultados obtenidos a través de la transferencia tecnológica?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="resultados" value="<?= $i ?>" id="resultados<?= $i ?>" required>
                        <label for="resultados<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Qué tan satisfecho está con el soporte técnico brindado después de la transferencia?</label>
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <input type="radio" name="soporte" value="<?= $i ?>" id="soporte<?= $i ?>" required>
                        <label for="soporte<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="question">
                <label>¿Tiene algún comentario adicional o sugerencia para mejorar el proceso de transferencia tecnológica?</label>
                <textarea name="comentarios" rows="4" placeholder="Escribe aquí tus comentarios"></textarea>
            </div>
            <button type="submit" class="submit-btn">Enviar</button>
        </form>
    </main>
    <footer class="footer">
        <p>Gracias por tu tiempo. ¡Juntos podemos mejorar!</p>
    </footer>
</body>

</html>