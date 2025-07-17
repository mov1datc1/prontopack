<?php
$host = 'localhost';
$db = 'dbgqc4ocvylt3w'; // Nombre de tu base de datos
$user = 'sqbdendqukqd3'; // Usuario MySQL que creaste en SiteGround
$pass = '5#wjio#1#2t2'; // 🔒 Sustituye esto por tu contraseña real

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>
