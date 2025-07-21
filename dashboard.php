<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Total de productos en inventario
$res1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM inventario");
$totalProductos = mysqli_fetch_assoc($res1)['total'];

// Total de solicitudes
$res2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM solicitudes");
$totalSolicitudes = mysqli_fetch_assoc($res2)['total'];

// Total de movimientos (si existe tabla movimientos)
$res3 = mysqli_query($conn, "SHOW TABLES LIKE 'movimientos'");
if (mysqli_num_rows($res3) > 0) {
    $resMovs = mysqli_query($conn, "SELECT COUNT(*) as total FROM movimientos");
    $totalMovimientos = mysqli_fetch_assoc($resMovs)['total'];
} else {
    $totalMovimientos = 'N/A';
}

// Productos con bajo stock (<= 5)
$res4 = mysqli_query($conn, "SELECT COUNT(*) as total FROM inventario WHERE cantidad <= 5");
$bajoStock = mysqli_fetch_assoc($res4)['total'];
?>

<div class="content">
    <h1 class="titulo">Dashboard</h1>

    <div class="kpis">
        <div class="kpi-card blue">
            <h2>Productos Totales</h2>
            <p><?php echo $totalProductos; ?></p>
        </div>
        <div class="kpi-card orange">
            <h2>Solicitudes Registradas</h2>
            <p><?php echo $totalSolicitudes; ?></p>
        </div>
        <div class="kpi-card green">
            <h2>Movimientos</h2>
            <p><?php echo $totalMovimientos; ?></p>
        </div>
        <div class="kpi-card red">
            <h2>Stock Bajo (&le; 5)</h2>
            <p><?php echo $bajoStock; ?></p>
        </div>
    </div>
</div>
