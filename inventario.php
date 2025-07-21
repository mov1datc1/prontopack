<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Obtener inventario actual
$inventario = mysqli_query($conn, "SELECT * FROM inventario ORDER BY id DESC");

// Procesar nueva entrada al inventario
if (isset($_POST['agregar'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    $cantidad = (int) $_POST['cantidad'];

    $sql = "INSERT INTO inventario (nombre, categoria, cantidad) VALUES ('$nombre', '$categoria', $cantidad)";
    mysqli_query($conn, $sql);
    header("Location: inventario.php");
    exit();
}

// Eliminar producto del inventario
if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];
    mysqli_query($conn, "DELETE FROM inventario WHERE id = $id");
    header("Location: inventario.php");
    exit();
}
?>

<div class="content">
    <h1 class="titulo">Inventario</h1>

    <!-- Formulario Agregar Producto -->
    <div class="form-container">
        <h2>Agregar Nuevo Producto</h2>
        <form method="POST" class="formulario">
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" name="categoria" id="categoria" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" required min="1">
            </div>
            <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
        </form>
    </div>

    <!-- Tabla Inventario -->
    <div class="table-container">
        <h2>Resumen de Inventario</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($inventario)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td>
                            <a href="inventario.php?eliminar=<?php echo $row['id']; ?>" class="btn-action delete" onclick="return confirm('Eliminar producto?')">🗑️</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>