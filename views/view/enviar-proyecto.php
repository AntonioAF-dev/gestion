<div class="formulario-proyecto-body">
    <div class="formulario-proyecto-contenedor">
        <form class="formulario-proyecto-form" id="proyectoForm">
            <div class="formulario-proyecto-seccion">
                <label for="titulo" class="formulario-proyecto-label">Título del Proyecto:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Ingrese Título Del Proyecto" class="formulario-proyecto-input">
            </div>

            <div class="formulario-proyecto-seccion">
                <h2 class="formulario-proyecto-titulo">Datos del investigador</h2>
                <div class="formulario-proyecto-grid">
                    <div>
                        <label for="nombres" class="formulario-proyecto-label">Nombres y Apellidos:</label>
                        <input type="text" id="nombres" name="nombres" class="formulario-proyecto-input">
                    </div>
                    <div>
                        <label for="dni" class="formulario-proyecto-label">Nº de DNI:</label>
                        <input type="text" id="dni" name="dni" class="formulario-proyecto-input">
                    </div>
                    <div>
                        <label for="codigo" class="formulario-proyecto-label">Código de Alumno:</label>
                        <input type="text" id="codigo" name="codigo" class="formulario-proyecto-input">
                    </div>
                    <div>
                        <label for="correo" class="formulario-proyecto-label">Correo Institucional:</label>
                        <input type="email" id="correo" name="correo" class="formulario-proyecto-input">
                    </div>
                    <div>
                        <label for="telefono" class="formulario-proyecto-label">Número de Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="formulario-proyecto-input">
                    </div>
                    <div>
                        <label for="facultad" class="formulario-proyecto-label">Facultad:</label>
                        <input type="text" id="facultad" name="facultad" class="formulario-proyecto-input">
                    </div>
                </div>
            </div>

            <div class="formulario-proyecto-seccion">
                <h2 class="formulario-proyecto-titulo">Información del Proyecto</h2>
                <div class="formulario-proyecto-grid">
                    <div>
                        <label for="area" class="formulario-proyecto-label">Área Temática:</label>
                        <select id="area" name="area" class="formulario-proyecto-select">
                            <option>Seleccione un área</option>
                            <option value="fin_carrera">Fin de Carrera</option>
                            <option value="segunda_especializacion">Segunda Especialización</option>
                            <option value="bachiller">Bachiller</option>
                            <option value="doctorado">Doctorado</option>
                            <option value="maestria">Maestría</option>
                        </select>
                    </div>
                    <div>
                        <label for="palabras" class="formulario-proyecto-label">Palabras Clave:</label>
                        <input type="text" id="palabras" name="palabras" class="formulario-proyecto-input">
                    </div>
                </div>
                <div>
                    <label for="descripcion" class="formulario-proyecto-label">Descripción Breve del Problema:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="formulario-proyecto-textarea"></textarea>
                </div>
                <div class="formulario-proyecto-grid">
                    <div>
                        <label for="objetivo" class="formulario-proyecto-label">Objetivo General:</label>
                        <textarea id="objetivo" name="objetivo" rows="4" class="formulario-proyecto-textarea"></textarea>
                    </div>
                    <div>
                        <label for="impacto" class="formulario-proyecto-label">Impacto Potencial y resultados esperados:</label>
                        <textarea id="impacto" name="impacto" rows="4" class="formulario-proyecto-textarea"></textarea>
                    </div>
                </div>
            </div>

            <div class="formulario-proyecto-boton-contenedor">
                <button type="submit" class="formulario-proyecto-boton">ENVIAR PROYECTO</button>
            </div>
        </form>
    </div>
</div>