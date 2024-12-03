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
        }

        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            text-align: center;
            font-size: 1.5rem;
        }

        .nav-menu {
            background: white;
            padding: 0.5rem;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .nav-button {
            padding: 0.5rem 1rem;
            border: 1px solid var(--primary-color);
            border-radius: 1.5rem;
            background: white;
            color: var(--primary-color);
            cursor: pointer;
            font-size: 0.9rem;
        }

        .nav-button:hover,
        .nav-button.active {
            background: var(--primary-color);
            color: white;
        }

        .container {
            max-width: 1000px;
            margin: 1rem auto;
            padding: 0 1rem;
        }

        .section {
            background: white;
            border-radius: 0.5rem;
            padding: 1rem;
            display: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .section.active {
            display: block;
        }

        .section-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--text-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        .form-full {
            grid-column: 1 / -1;
        }

        .form-group {
            margin-bottom: 0.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            font-size: 0.9rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
        }

        textarea.form-control {
            height: 80px;
            resize: none;
        }

        .teachers-section {
            background: #f8fafc;
            padding: 0.75rem;
            border-radius: 0.25rem;
            margin: 1rem 0;
        }

        .add-teacher {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-add {
            background: var(--secondary-color);
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .teacher-list {
            max-height: 200px;
            overflow-y: auto;
        }

        .teacher-item {
            padding: 0.5rem;
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .delete-btn {
            color: #ef4444;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0.25rem 0.5rem;
        }

        .project-list {
            margin-top: 1rem;
        }

        .project-card {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            background: white;
        }

        .project-card h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .project-card p {
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .alert {
            padding: 0.75rem;
            border-radius: 0.25rem;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
            display: none;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .add-teacher {
                grid-template-columns: 1fr;
            }
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

        <section id="projects" class="section active">
            <h2 class="section-title">Registro de Proyectos</h2>
            <form id="projectForm" onsubmit="return handleProjectSubmit(event)">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Nombre del Proyecto</label>
                        <input type="text" class="form-control" id="projectName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Disciplinas Involucradas</label>
                        <input type="text" class="form-control" id="disciplines" required>
                    </div>
                    <div class="form-group form-full">
                        <label class="form-label">Objetivos</label>
                        <textarea class="form-control" id="objectives" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Roles Necesarios</label>
                        <input type="text" class="form-control" id="roles" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="date" class="form-control" id="startDate" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fecha Fin</label>
                        <input type="date" class="form-control" id="endDate" required>
                    </div>
                </div>

                <div class="teachers-section">
                    <div class="add-teacher">
                        <input type="text" class="form-control" id="teacherName" placeholder="Nombre del docente">
                        <input type="text" class="form-control" id="specialty" placeholder="Especialidad">
                        <select class="form-control" id="faculty">
                            <option value="">Facultad</option>
                            <option value="1">Ingeniería</option>
                            <option value="2">Ciencias</option>
                            <option value="3">Humanidades</option>
                        </select>
                        <button type="button" class="btn btn-add" onclick="addTeacher()">Agregar</button>
                    </div>
                    <div id="teacherList" class="teacher-list"></div>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Proyecto</button>
            </form>

            <div id="projectsList" class="project-list"></div>
        </section>
    </div>

    <script>
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
                showAlert('Complete todos los campos del docente', 'error');
                return;
            }

            teachers.push({
                name,
                specialty,
                faculty: facultyName
            });
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
            list.innerHTML = teachers.map((teacher, index) => `
                <div class="teacher-item">
                    <span>${teacher.name} - ${teacher.specialty} - ${teacher.faculty}</span>
                    <button class="delete-btn" onclick="removeTeacher(${index})">×</button>
                </div>
            `).join('');
        }

        function handleProjectSubmit(event) {
            event.preventDefault();

            if (teachers.length === 0) {
                showAlert('Agregue al menos un docente', 'error');
                return false;
            }

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

            event.target.reset();
            teachers = [];
            updateTeachersList();

            return false;
        }

        function updateProjectsList() {
            const list = document.getElementById('projectsList');
            list.innerHTML = projects.map(project => `
                <div class="project-card">
                    <h3>${project.name}</h3>
                    <p><strong>Objetivos:</strong> ${project.objectives}</p>
                    <p><strong>Disciplinas:</strong> ${project.disciplines}</p>
                    <p><strong>Periodo:</strong> ${project.startDate} - ${project.endDate}</p>
                    <p><strong>Docentes:</strong> ${project.teachers.map(t => t.name).join(', ')}</p>
                </div>
            `).join('');
        }
    </script>
</body>

</html>