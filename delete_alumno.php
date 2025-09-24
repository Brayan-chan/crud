<?php
include 'config/config.php';

// Verificar si se recibió un ID por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Preparar la consulta SQL para eliminar el alumno
    $sql = "DELETE FROM alumnos WHERE id = ?";
    
    // Preparar la declaración
    if ($stmt = $conn->prepare($sql)) {
        // Vincular parámetro
        $stmt->bind_param("i", $id);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<script>
                        alert('Alumno eliminado correctamente');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el alumno a eliminar');
                        window.location.href = 'index.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Error al eliminar el alumno: " . $stmt->error . "');
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
    // Si no hay ID, redirigir al index
    header("Location: index.php");
    exit();
}

// Cerrar la conexión
$conn->close();
?>