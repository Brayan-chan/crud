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
    <form id="form" method="POST" action="insert_alumnos.php">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
        <label for="correo">Correo</label>
        <input type="email" name="correo" placeholder="Ingrese su correo" required>
        <label for="matricula">Matricula</label>
        <input type="text" name="matricula" placeholder="Ingrese su matricula" required>
        <input type="submit" value="Guardar">
    </form>

    <div id="contenedor">
        <h2>Lista de Alumnos</h2>
        <?php include 'get_alumnos.php'; ?>
    </div>
    
    <script>
        function editarAlumno(id) {
            window.location.href = 'edit_alumno.php?id=' + id;
        }
        
        function eliminarAlumno(id) {
            if(confirm('¿Estás seguro de que quieres eliminar este alumno?')) {
                alert('Funcionalidad de eliminar alumno con ID: ' + id + ' (próximamente)');
            }
        }
    </script>
</body>
</html>