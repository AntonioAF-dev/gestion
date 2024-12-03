<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Catalogados</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 768px) {
            main {
                flex-direction: row;
            }
        }

        section {
            padding: 1.5rem;
            overflow-y: auto;
        }

        .projects-list {
            background-color: #fff;
            border-right: 2px solid #e5e7eb;
            flex-shrink: 0;
            width: 100%;
        }

        @media (min-width: 768px) {
            .projects-list {
                width: 33%;
            }
        }

        .projects-list h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .projects-list ul {
            list-style: none;
        }

        .projects-list li {
            margin-bottom: 1rem;
        }

        .projects-list button {
            color: #2563eb;
            text-decoration: underline;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1rem;
        }

        .projects-list button:hover {
            text-decoration: none;
        }

        .project-info {
            background-color: #f9fafb;
            flex-grow: 1;
        }

        .project-info h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .project-info p {
            color: #6b7280;
        }

        .project-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .project-details div {
            padding: 1rem;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }

        footer {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <!-- Contenedor Principal -->
    <main>
        <!-- Lista de Proyectos -->
        <section id="#proyecto_catalogado" class="projects-list">
            <h2>Lista de Proyectos</h2>
            <ul>
                <li><button onclick="showProjectInfo('Proyecto 1')">Proyecto 1</button></li>
                <li><button onclick="showProjectInfo('Proyecto 2')">Proyecto 2</button></li>
                <li><button onclick="showProjectInfo('Proyecto 3')">Proyecto 3</button></li>
                <li><button onclick="showProjectInfo('Proyecto 4')">Proyecto 4</button></li>
                <li><button onclick="showProjectInfo('Proyecto 5')">Proyecto 5</button></li>
            </ul>
        </section>

        <!-- Información del Proyecto -->
        <section id="projectInfo" class="project-info">
            <h2>Detalles del Proyecto</h2>
            <p>Selecciona un proyecto de la lista para ver su información.</p>
        </section>
    </main>
    <script>
        const projectData = {
            "Proyecto 1": {
                pi: "Juan Pérez",
                invest: "María López",
                asesor: "Carlos Ramírez",
                inversionista: "Ana Martínez"
            },
            "Proyecto 2": {
                pi: "Luis Gómez",
                invest: "Sofía Hernández",
                asesor: "Fernando Torres",
                inversionista: "Laura Gutiérrez"
            },
            "Proyecto 3": {
                pi: "Pedro Morales",
                invest: "Lucía Ortiz",
                asesor: "José Navarro",
                inversionista: "Claudia Vega"
            },
            "Proyecto 4": {
                pi: "Ricardo Díaz",
                invest: "Patricia Suárez",
                asesor: "Miguel Vázquez",
                inversionista: "Roberto Méndez"
            },
            "Proyecto 5": {
                pi: "Sandra Castillo",
                invest: "Diego Alonso",
                asesor: "Valeria Núñez",
                inversionista: "Andrea Sánchez"
            }
        };

        function showProjectInfo(project) {
            const info = projectData[project];
            const projectInfoDiv = document.getElementById('projectInfo');
            projectInfoDiv.innerHTML = `
                <h2>Detalles del Proyecto: ${project}</h2>
                <div class="project-details">
                    <div>Nombre del PI: <strong>${info.pi}</strong></div>
                    <div>Nombre del Invest: <strong>${info.invest}</strong></div>
                    <div>Nombre del Asesor: <strong>${info.asesor}</strong></div>
                    <div>Nombre del Inversionista: <strong>${info.inversionista}</strong></div>
                </div>
            `;
        }
    </script>
</body>
</html>
