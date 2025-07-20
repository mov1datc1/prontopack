<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Agregar solicitud
if (isset($_POST['agregar'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $estatus = 'pendiente';

    $sql = "INSERT INTO solicitudes (nombre, descripcion, estatus) VALUES ('$nombre', '$descripcion', '$estatus')";
    mysqli_query($conn, $sql);
    header("Location: solicitudes.php");
    exit();
}

// Eliminar solicitud
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    mysqli_query($conn, "DELETE FROM solicitudes WHERE id = $id");
    header("Location: solicitudes.php");
    exit();
}

// Obtener solicitudes
$solicitudes = mysqli_query($conn, "SELECT * FROM solicitudes ORDER BY id DESC");
?>

<div class="content">
    <h1 class="titulo">Solicitudes</h1>

    <!-- Formulario Nueva Solicitud -->
    <div class="form-container">
        <h2>Agregar Nueva Solicitud</h2>
        <form method="POST" class="formulario">
            <div class="form-group">
                <label for="nombre">Nombre del Solicitante</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
        </form>
    </div>

    <!-- Tabla de Solicitudes -->
    <div class="table-container">
        <h2>Solicitudes Registradas</h2>
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
                <?php while ($row = mysqli_fetch_assoc($solicitudes)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td>
                            <span class="badge <?php echo $row['estatus']; ?>">
                                <?php echo ucfirst($row['estatus']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="editar_solicitud.php?id=<?php echo $row['id']; ?>" class="btn-action edit">✏️</a>
                            <a href="solicitudes.php?eliminar=<?php echo $row['id']; ?>" class="btn-action delete" onclick="return confirm('¿Eliminar esta solicitud?')">🗑️</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
