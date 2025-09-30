<?php
// Solo ejecutar una vez para configurar la DB
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);

// Crear base de datos
$conn->query("CREATE DATABASE IF NOT EXISTS crud");
$conn->select_db("crud");

// Crear tabla
$sql = "CREATE TABLE IF NOT EXISTS alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    matricula VARCHAR(50) NOT NULL
)";

$conn->query($sql);
echo "Base de datos configurada correctamente";
?>