<?php
include 'includes/sidebar.php';
include 'includes/conexion.php';

// Eliminar producto
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    mysqli_query($conn, "DELETE FROM inventario WHERE id=$id");
    header("Location: inventario.php");
    exit();
}

// Cargar inventario
$productos = mysqli_query($conn, "SELECT * FROM inventario ORDER BY categoria, nombre");
?>

<div class="content">
    <div class="header-bar">
        <h2>Inventario Actual</h2>
        <a href="inventario_nuevo.php" class="btn-primary">+ Agregar Producto</a>
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Ubicación</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($productos)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['categoria']) ?></td>
                    <td><?= htmlspecialchars($row['ubicacion']) ?></td>
                    <td><?= $row['cantidad'] ?></td>
                    <td><?= htmlspecialchars($row['unidad']) ?></td>
                    <td>
                        <a href="inventario_editar.php?id=<?= $row['id'] ?>" class="btn-edit">✏️</a>
                        <a href="inventario.php?eliminar=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('¿Eliminar este producto?')">🗑️</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
