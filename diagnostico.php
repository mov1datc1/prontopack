<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diagnóstico WMS</title>
    <link rel="stylesheet" href="assets/estilos.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>🔍 Diagnóstico del Proyecto</h1>

    <h2>1. Estado de conexión a base de datos</h2>
    <?php
    try {
        $pdo->query("SELECT 1");
        echo "<p style='color: green;'>✅ Conexión exitosa a la base de datos.</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Error en conexión: " . $e->getMessage() . "</p>";
    }
    ?>

    <h2>2. Comprobación de estilos</h2>
    <div style="padding: 10px; background-color: var(--color-principal); color: white;">
        Si ves este bloque con fondo azul oscuro, el CSS se cargó correctamente.
    </div>

    <h2>3. Carga de menú lateral (sidebar)</h2>
    <?php include 'includes/sidebar.php'; ?>

</body>
</html>
