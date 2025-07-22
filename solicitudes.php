<?php
require_once 'config.php';

// Agregar nueva solicitud
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $estatus = $_POST["estatus"] ?? 'pendiente';

    if (!empty($nombre) && !empty($descripcion)) {
        $stmt = $conn->prepare("INSERT INTO solicitudes (tipo, descripcion, estado) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $descripcion, $estatus);
        $stmt->execute();
    }
}

// Obtener solicitudes
$solicitudes = $conn->query("SELECT * FROM solicitudes");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="assets/estilos.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>

    <main class="main-content">
        <div class="top-bar">
            <h1>Solicitudes</h1>
            <button class="btn" onclick="document.getElementById('form-popup').style.display='block'">➕ Nueva Solicitud</button>
        </div>

        <div id="form-popup" class="form-popup">
            <form class="form-container" method="POST">
                <h2>Agregar Nueva Solicitud</h2>
                <div class="form-group">
                    <label for="nombre">Nombre del Solicitante</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="estatus">Estatus</label>
                    <select name="estatus">
                        <option value="pendiente">Pendiente</option>
                        <option value="proceso">En Proceso</option>
                        <option value="realizado">Realizado</option>
                    </select>
                </div>
                <button class="btn" type="submit">Agregar</button>
                <button class="btn-secondary" type="button" onclick="document.getElementById('form-popup').style.display='none'">Cancelar</button>
            </form>
        </div>

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
                    <?php while ($row = $solicitudes->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= htmlspecialchars($row["tipo"] ?? '') ?></td>
                            <td><?= htmlspecialchars($row["descripcion"] ?? '') ?></td>
                            <td><span class="badge <?= $row["estado"] ?>"><?= ucfirst($row["estado"]) ?></span></td>
                            <td>
                                <a href="#" class="btn-action edit">✏️</a>
                                <a href="#" class="btn-action delete">🗑️</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
