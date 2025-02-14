<?php
$servername = "localhost";
$username = "root";  // Reemplaza con tu nombre de usuario
$password = "";  // Reemplaza con tu contraseña
$dbname = "tienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
