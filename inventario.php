
<?php
include 'includes/sidebar.php';
include 'includes/conexion.php';

$stmt = $pdo->query("SELECT * FROM inventario");
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="content">
    <h2>Inventario</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>SKU</th><th>Descripción</th><th>Ubicación</th><th>Cantidad</th>
        </tr>
        <?php foreach ($datos as $fila): ?>
        <tr>
            <td><?= $fila['sku'] ?></td>
            <td><?= $fila['descripcion'] ?></td>
            <td><?= $fila['ubicacion'] ?></td>
            <td><?= $fila['cantidad'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<link rel="stylesheet" href="assets/estilos.css">
