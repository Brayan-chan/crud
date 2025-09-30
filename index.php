<?php
include 'Config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - PHP</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- Formulario para agregar un nuevo alumno -->
    <!-- El METODO POST es más seguro para enviar datos -->
    <!-- El action es la página que procesará el formulario -->
    <form id="form" method="POST" action="insert_alumnos.php">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
        <label for="correo">Correo</label>
        <input type="email" name="correo" placeholder="Ingrese su correo" required>
        <label for="matricula">Matricula</label>
        <input type="text" name="matricula" placeholder="Ingrese su matricula" required>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Guardar">
    </form>

    <!-- Contenedor para la lista de alumnos -->
    <div id="contenedor">
        <h2>Lista de Alumnos</h2>
        <!-- Obtener y mostrar los alumnos desde la base de datos -->
        <?php include 'get_alumnos.php'; ?>
    </div>
    
    <!-- Script para editar y eliminar un alumno -->
    <script>
        // Le mandamos el id del alumno a editar o eliminar como parámetro en la URL
        function editarAlumno(id) {
            window.location.href = 'edit_alumno.php?id=' + id;
        }
        
        function eliminarAlumno(id) {
            if(confirm('¿Estás seguro de que quieres eliminar este alumno?')) {
                window.location.href = 'delete_alumno.php?id=' + id;
            }
        }
    </script>
</body>
</html>