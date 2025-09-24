<?php
include 'config/config.php';

// Función para obtener todos los alumnos
function obtenerAlumnos($conn) {
    $sql = "SELECT id, nombre, correo, matricula FROM alumnos ORDER BY id ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Correo</th>";
        echo "<th>Matrícula</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        // Mostrar cada fila de datos
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["correo"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["matricula"]) . "</td>";
            echo "<td>";
            echo "<button onclick='editarAlumno(" . $row["id"] . ")' class='btn-editar'>Editar</button> ";
            echo "<button onclick='eliminarAlumno(" . $row["id"] . ")' class='btn-eliminar'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No hay alumnos registrados.</p>";
    }
}

// Llamar a la función
obtenerAlumnos($conn);

// Cerrar la conexión
$conn->close();
?>