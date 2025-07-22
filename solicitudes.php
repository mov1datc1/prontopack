<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Agregar o editar solicitud
if (isset($_POST['guardar'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $estatus = mysqli_real_escape_string($conn, $_POST['estatus']);
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        $sql = "UPDATE solicitudes SET tipo='$nombre', descripcion='$descripcion', estado='$estatus' WHERE id=$id";
    } else {
        $sql = "INSERT INTO solicitudes (tipo, descripcion, estado) VALUES ('$nombre', '$descripcion', '$estatus')";
    }

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

// Obtener datos para edición
$editando = false;
$solicitud_edit = ['id' => '', 'tipo' => '', 'descripcion' => '', 'estado' => 'pendiente'];
if (isset($_GET['editar'])) {
    $editando = true;
    $id = (int)$_GET['editar'];
    $res = mysqli_query($conn, "SELECT * FROM solicitudes WHERE id = $id");
    $solicitud_edit = mysqli_fetch_assoc($res);
}

// Obtener todas las solicitudes
$solicitudes = mysqli_query($conn, "SELECT * FROM solicitudes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="assets/estilos.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <div class="content">
        <h1 class="titulo">Solicitudes</h1>

        <!-- Formulario -->
        <div class="form-container">
            <h2><?php echo $editando ? 'Editar Solicitud' : 'Agregar Nueva Solicitud'; ?></h2>
            <form method="POST" class="formulario">
                <input type="hidden" name="id" value="<?php echo $solicitud_edit['id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre del Solicitante</label>
                    <input type="text" name="nombre" id="nombre" required value="<?php echo $solicitud_edit['tipo']; ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" required><?php echo $solicitud_edit['descripcion']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="estatus">Estatus</label>
                    <select name="estatus" id="estatus" required>
                        <option value="pendiente" <?php if ($solicitud_edit['estado'] == 'pendiente') echo 'selected'; ?>>Pendiente</option>
                        <option value="proceso" <?php if ($solicitud_edit['estado'] == 'proceso') echo 'selected'; ?>>En proceso</option>
                        <option value="realizado" <?php if ($solicitud_edit['estado'] == 'realizado') echo 'selected'; ?>>Realizado</option>
                    </select>
                </div>
                <button type="submit" name="guardar" class="btn btn-primary"><?php echo $editando ? 'Actualizar' : 'Agregar'; ?></button>
            </form>
        </div>

        <!-- Tabla -->
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
                            <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                            <td>
                                <span class="badge <?php echo $row['estado']; ?>">
                                    <?php echo ucfirst($row['estado']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="solicitudes.php?editar=<?php echo $row['id']; ?>" class="btn-action edit">✏️</a>
                                <a href="solicitudes.php?eliminar=<?php echo $row['id']; ?>" class="btn-action delete" onclick="return confirm('¿Eliminar esta solicitud?')">🗑️</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
