<?php
$host = '127.0.0.1';
$db = 'dbqgc4ocvlyt3w'; // Nombre de tu base de datos
$user = 'urfzdrmdwrokn'; // Usuario MySQL que creaste en SiteGround
$pass = 'c1$2@5@f151b'; // 🔒 Sustituye esto por tu contraseña real
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("❌ Error de conexión a la base de datos: " . mysqli_connect_error());
}
?>
