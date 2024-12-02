<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-3xl">
        <form>
            <div class="mb-6">
                <label for="titulo" class="block text-gray-700 font-bold mb-2">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="INGRESE TÍTULO DEL PROYECTO - INVESTIGACIÓN DE FIN DE CARRERA" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <h2 class="text-blue-600 font-bold mb-2">Datos del investigador</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombres" class="block text-gray-700 mb-2">Nombres y Apellidos:</label>
                        <input type="text" id="nombres" name="nombres" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="dni" class="block text-gray-700 mb-2">Nº de DNI:</label>
                        <input type="text" id="dni" name="dni" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="codigo" class="block text-gray-700 mb-2">Código de Alumno:</label>
                        <input type="text" id="codigo" name="codigo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="correo" class="block text-gray-700 mb-2">Correo Institucional:</label>
                        <input type="email" id="correo" name="correo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="telefono" class="block text-gray-700 mb-2">Número de Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="facultad" class="block text-gray-700 mb-2">Facultad:</label>
                        <input type="text" id="facultad" name="facultad" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <h2 class="text-blue-600 font-bold mb-2">Información del Proyecto</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="area" class="block text-gray-700 mb-2">Área Temática:</label>
                        <select id="area" name="area" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Seleccione un área</option>
                        </select>
                    </div>
                    <div>
                        <label for="palabras" class="block text-gray-700 mb-2">Palabras Clave:</label>
                        <input type="text" id="palabras" name="palabras" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="mt-4">
                    <label for="descripcion" class="block text-gray-700 mb-2">Descripción Breve del Problema:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="objetivo" class="block text-gray-700 mb-2">Objetivo General:</label>
                        <textarea id="objetivo" name="objetivo" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label for="impacto" class="block text-gray-700 mb-2">Impacto Potencial y resultados esperados:</label>
                        <textarea id="impacto" name="impacto" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">ENVIAR PROYECTO</button>
            </div>
        </form>
    </div>