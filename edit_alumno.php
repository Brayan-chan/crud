<?php
include 'config/config.php';

// Verificar si se recibió un ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del alumno
    $sql = "SELECT id, nombre, correo, matricula FROM alumnos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $alumno = $result->fetch_assoc();
    } else {
        echo "<script>alert('Alumno no encontrado'); window.location.href = 'index.php';</script>";
        exit();
    }
    
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form id="form" method="POST" action="update_alumno.php">
        <h2>Editar Alumno</h2>
        <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
        
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($alumno['nombre']); ?>" required>
        
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($alumno['correo']); ?>" required>
        
        <label for="matricula">Matricula</label>
        <input type="text" name="matricula" value="<?php echo htmlspecialchars($alumno['matricula']); ?>" required>
        
        <input type="submit" value="Actualizar">
        <a href="index.php" style="display: inline-block; margin-top: 10px; text-align: center; color: #666;">Cancelar</a>
    </form>
</body>
</html>