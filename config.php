<?php
$host = '127.0.0.1';
$db = 'dbqgc4ocvlyt3w'; // Nombre de tu base de datos
$user = 'urfzdrmdwrokn'; // Usuario MySQL que creaste en SiteGround
$pass = 'c1$2@5@f151b'; // 🔒 Sustituye esto por tu contraseña real

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Conexión fallida: " . $conn->connect_error);
}
?>