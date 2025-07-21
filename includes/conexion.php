<?php
require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $pdo = null; // continúa sin conexión
    $db_error = "❌ Error de conexión a la base de datos.";
}
?>
