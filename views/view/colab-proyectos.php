<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Proyectos Colaborativos</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --background-color: #f8fafc;
            --text-color: #1e293b;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
        }

        .nav-menu {
            background: white;
            padding: 1rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .nav-button {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 2rem;
            background: white;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-button:hover,
        .nav-button.active {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            color: var(--text-color);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .add-teacher {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
            width: 100%;
        }

        .btn-add {
            background: var(--secondary-color);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .teacher-list {
            margin-top: 2rem;
        }

        .teacher-item {
            padding: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .teacher-info {
            display: flex;
            gap: 2rem;
        }

        .delete-btn {
            color: #ef4444;
            cursor: pointer;
            padding: 0.5rem;
            border: none;
            background: none;
            font-size: 1.2rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            display: none;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #166534;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #991b1b;
        }

        .active-projects {
            margin-top: 2rem;
        }

        .project-card {
            padding: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>PORTAL DE PROYECTOS COLABORATIVOS</h1>
    </header>

    <nav class="nav-menu">
        <button class="nav-button active" onclick="showSection('projects')">Proyectos</button>
        <button class="nav-button" onclick="showSection('teachers')">Docentes</button>
        <button class="nav-button" onclick="showSection('forum')">Foro</button>
        <button class="nav-button" onclick="showSection('calendar')">Calendario</button>
    </nav>

    <div class="container">
        <div id="alert" class="alert"></div>

        <!-- Sección Proyectos -->
        <section id="projects" class="section active">
            <h2 class="section-title">Registro de Proyectos</h2>
            <form id="projectForm" onsubmit="return handleProjectSubmit(event)">
                <div class="form-group">
                    <input type="text" class="form-control" id="projectName" placeholder="Nombre del Proyecto" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="objectives" placeholder="Objetivos" required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="disciplines" placeholder="Disciplinas Involucradas" required></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="roles" placeholder="Roles Necesarios" required></textarea>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="startDate" required>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="endDate" required>
                </div>

                <div class="form-group">
                    <h3>Agregar Docente</h3>
                    <div class="add-teacher">
                        <input type="text" class="form-control" id="teacherName" placeholder="Nombre del docente">
                        <input type="text" class="form-control" id="specialty" placeholder="Especialidad">
                        <select class="form-control" id="faculty">
                            <option value="">Seleccione Facultad</option>
                            <option value="1">Facultad de Ingeniería</option>
                            <option value="2">Facultad de Ciencias</option>
                            <option value="3">Facultad de Humanidades</option>
                        </select>
                        <button type="button" class="btn btn-add" onclick="addTeacher()">Agregar</button>
                    </div>
                </div>

                <div id="teacherList" class="teacher-list"></div>

                <button type="submit" class="btn btn-primary">REGISTRAR PROYECTO</button>
            </form>

            <div class="active-projects">
                <h3 class="section-title">Proyectos Activos</h3>
                <div id="projectsList"></div>
            </div>
        </section>
    </div>

    <script>
        // Array para almacenar los docentes
        let teachers = [];
        let projects = [];

        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');

            document.querySelectorAll('.nav-button').forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        function showAlert(message, type) {
            const alert = document.getElementById('alert');
            alert.className = `alert alert-${type}`;
            alert.textContent = message;
            alert.style.display = 'block';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }

        function addTeacher() {
            const name = document.getElementById('teacherName').value;
            const specialty = document.getElementById('specialty').value;
            const faculty = document.getElementById('faculty');
            const facultyName = faculty.options[faculty.selectedIndex].text;

            if (!name || !specialty || !faculty.value) {
                showAlert('Por favor complete todos los campos del docente', 'error');
                return;
            }

            const teacher = {
                name,
                specialty,
                faculty: facultyName
            };

            teachers.push(teacher);
            updateTeachersList();
            clearTeacherForm();
        }

        function clearTeacherForm() {
            document.getElementById('teacherName').value = '';
            document.getElementById('specialty').value = '';
            document.getElementById('faculty').value = '';
        }

        function removeTeacher(index) {
            teachers.splice(index, 1);
            updateTeachersList();
        }

        function updateTeachersList() {
            const list = document.getElementById('teacherList');
            list.innerHTML = '';

            teachers.forEach((teacher, index) => {
                const div = document.createElement('div');
                div.className = 'teacher-item';
                div.innerHTML = `
                    <div class="teacher-info">
                        <span>${teacher.name}</span>
                        <span>${teacher.specialty}</span>
                        <span>${teacher.faculty}</span>
                    </div>
                    <button class="delete-btn" onclick="removeTeacher(${index})">×</button>
                `;
                list.appendChild(div);
            });
        }

        function handleProjectSubmit(event) {
            event.preventDefault();

            const project = {
                name: document.getElementById('projectName').value,
                objectives: document.getElementById('objectives').value,
                disciplines: document.getElementById('disciplines').value,
                roles: document.getElementById('roles').value,
                startDate: document.getElementById('startDate').value,
                endDate: document.getElementById('endDate').value,
                teachers: [...teachers]
            };

            projects.push(project);
            updateProjectsList();
            showAlert('Proyecto registrado exitosamente', 'success');

            // Limpiar formulario
            event.target.reset();
            teachers = [];
            updateTeachersList();

            return false;
        }

        function updateProjectsList() {
            const list = document.getElementById('projectsList');
            list.innerHTML = '';

            projects.forEach(project => {
                const div = document.createElement('div');
                div.className = 'project-card';
                div.innerHTML = `
                    <h3>${project.name}</h3>
                    <p><strong>Objetivos:</strong> ${project.objectives}</p>
                    <p><strong>Disciplinas:</strong> ${project.disciplines}</p>
                    <p><strong>Fecha inicio:</strong> ${project.startDate}</p>
                    <p><strong>Fecha fin:</strong> ${project.endDate}</p>
                    <p><strong>Docentes:</strong> ${project.teachers.map(t => t.name).join(', ')}</p>
                `;
                list.appendChild(div);
            });
        }
    </script>
</body>

</html>