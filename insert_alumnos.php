<?php
include 'config/config.php';

// Verificar si el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $matricula = $_POST['matricula'];
    
    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($correo) && !empty($matricula)) {
        // Preparar la consulta SQL para insertar datos
        $sql = "INSERT INTO alumnos (nombre, correo, matricula) VALUES (?, ?, ?)";
        
        // Preparar la declaración
        if ($stmt = $conn->prepare($sql)) {
            // Vincular parámetros (s = string, i = integer, d = double)
            $stmt->bind_param("sss", $nombre, $correo, $matricula);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir al usuario a la página principal con un mensaje de éxito
                echo "<script>
                        alert('Alumno insertado correctamente');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error al insertar el alumno: " . $stmt->error . "');
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