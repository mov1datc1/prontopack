<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Alerta de error si falla la conexión
if (!isset($pdo)) {
    echo "<div class='error-alert'>❌ Error al conectar con la base de datos.</div>";
    return;
}

// Agregar solicitud
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estatus = 'pendiente';

    $stmt = $pdo->prepare("INSERT INTO solicitudes (nombre, descripcion, estatus) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $descripcion, $estatus]);
    header("Location: solicitudes.php");
    exit();
}

// Eliminar solicitud
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    $pdo->prepare("DELETE FROM solicitudes WHERE id = ?")->execute([$id]);
    header("Location: solicitudes.php");
    exit();
}

// Obtener solicitudes
$stmt = $pdo->query("SELECT * FROM solicitudes ORDER BY id DESC");
$solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content">
    <h1 class="titulo">📋 Solicitudes</h1>

    <!-- Formulario Nueva Solicitud -->
    <div class="form-container">
        <h2>➕ Agregar Nueva Solicitud</h2>
        <form method="POST" class="formulario">
            <div class="form-group">
                <label for="nombre">👤 Nombre del Solicitante</label>
                <input type="text" name="nombre" id="nombre" required placeholder="Ej. Ana Pérez">
            </div>
            <div class="form-group">
                <label for="descripcion">📝 Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" required placeholder="Describe lo solicitado..."></textarea>
            </div>
            <button type="submit" name="agregar" class="btn btn-primary">✅ Agregar</button>
        </form>
    </div>

    <!-- Tabla de Solicitudes -->
    <div class="table-container">
        <h2>📄 Solicitudes Registradas</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['nombre']); ?></td>
                        <td><?= htmlspecialchars($row['descripcion']); ?></td>
                        <td>
                            <span class="badge <?= $row['estatus']; ?>">
                                <?= ucfirst($row['estatus']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="editar_solicitud.php?id=<?= $row['id']; ?>" class="btn-action edit">✏️</a>
                            <a href="solicitudes.php?eliminar=<?= $row['id']; ?>" class="btn-action delete" onclick="return confirm('¿Eliminar esta solicitud?')">🗑️</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
