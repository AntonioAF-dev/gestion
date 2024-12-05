<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Discusión - Proyectos de Investigación</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-color: #ecf0f1;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--background-color) 0%, #f8f9fa 100%);
            color: var(--primary-color);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: var(--secondary-color);
        }

        .card h2 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .card p {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background: var(--secondary-color);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-color);
        }

        .author {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
        }

        .date {
            font-size: 0.8rem;
            color: #999;
        }

        .new-post-form {
            background: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: var(--card-shadow);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("../../config/conexion.php");
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Manejo del formulario de nuevo post
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['titulo']) && isset($_POST['contenido'])) {
            $titulo = htmlspecialchars($_POST['titulo']);
            $contenido = htmlspecialchars($_POST['contenido']);
            $usuario_id = $_SESSION['id_usuario'];

            $sql = "INSERT INTO foro_posts (titulo, contenido, usuario_id, fecha_creacion) VALUES (?, ?, ?, NOW())";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssi", $titulo, $contenido, $usuario_id);

            if ($stmt->execute()) {
                echo "<div class='alert success'>Post creado exitosamente</div>";
            } else {
                echo "<div class='alert error'>Error al crear el post</div>";
            }
        }
        ?>

        <!-- Formulario para nuevo post -->
        <div class="new-post-form">
            <h2>Crear Nueva Publicación</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea id="contenido" name="contenido" required></textarea>
                </div>
                <button type="submit" class="btn">Publicar</button>
            </form>
        </div>

        <!-- Lista de posts -->
        <div class="card-grid">
            <?php
            $sql = "SELECT fp.*, u.Nombre as autor 
                    FROM foro_posts fp 
                    JOIN usuarios u ON fp.usuario_id = u.idusuarios 
                    ORDER BY fp.fecha_creacion DESC";
            $result = $conexion->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h2>" . htmlspecialchars($row['titulo']) . "</h2>";
                echo "<div class='author'>Por: " . htmlspecialchars($row['autor']) . "</div>";
                echo "<div class='date'>" . date('d/m/Y H:i', strtotime($row['fecha_creacion'])) . "</div>";
                echo "<p>" . nl2br(htmlspecialchars($row['contenido'])) . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>