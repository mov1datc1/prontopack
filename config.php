<?php
$host = 'localhost';
$db = 'dbgqc4ocvylt3w'; // Nombre de tu base de datos
$user = 'urfzdrmdwrokn'; // Usuario MySQL que creaste en SiteGround
$pass = 'c1$2@5@f151b'; // 🔒 Sustituye esto por tu contraseña real

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>
