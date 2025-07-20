<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// KPIs desde la base de datos
$totalSolicitudes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM solicitudes"))['total'];
$totalInventario = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM inventario"))['total'];
$totalMovimientos = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM movimientos"))['total'];
$pendientes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM solicitudes WHERE estatus = 'pendiente'"))['total'];
?>
<div class="content">
  <h1 class="titulo">Dashboard</h1>
  <div class="kpis">
    <div class="kpi-card blue">
      <h2>Total Solicitudes</h2>
      <p><?php echo $totalSolicitudes; ?></p>
    </div>
    <div class="kpi-card green">
      <h2>Inventario</h2>
      <p><?php echo $totalInventario; ?></p>
    </div>
    <div class="kpi-card orange">
      <h2>Movimientos</h2>
      <p><?php echo $totalMovimientos; ?></p>
    </div>
    <div class="kpi-card red">
      <h2>Pendientes</h2>
      <p><?php echo $pendientes; ?></p>
    </div>
  </div>
</div>
