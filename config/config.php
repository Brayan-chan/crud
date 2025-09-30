<?php
    $host = "localhost"; // Servidor de la base de datos
    $user = "root"; // Usuario de la base de datos
    $pass = ""; // Contraseña de la base de datos
    $db = "crud"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($host, $user, $pass, $db);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>