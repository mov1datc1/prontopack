
<?php
$host = 'localhost';
$dbname = 'wms';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
