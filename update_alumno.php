<?php
include 'config/config.php';

// Verificar si el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $matricula = $_POST['matricula'];
    
    // Validar que los campos no estén vacíos
    if (!empty($id) && !empty($nombre) && !empty($correo) && !empty($matricula)) {
        // Preparar la consulta SQL para actualizar datos
        $sql = "UPDATE alumnos SET nombre = ?, correo = ?, matricula = ? WHERE id = ?";
        
        // Preparar la declaración
        if ($stmt = $conn->prepare($sql)) {
            // Vincular parámetros
            $stmt->bind_param("sssi", $nombre, $correo, $matricula, $id);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<script>
                        alert('Alumno actualizado correctamente');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error al actualizar el alumno: " . $stmt->error . "');
                        window.location.href = 'index.php';
                      </script>";
            }
            
            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "<script>
                    alert('Error en la preparación de la consulta: " . $conn->error . "');
                    window.location.href = 'index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Por favor, complete todos los campos');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    // Si no es POST, redirigir al formulario
    header("Location: index.php");
    exit();
}

// Cerrar la conexión
$conn->close();
?>