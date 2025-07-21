<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

$hoy = date('Y-m-d');
$res = mysqli_query($conn, "SELECT * FROM movimientos WHERE DATE(fecha) = '$hoy' ORDER BY fecha DESC");
?>

<div class="content">
    <h1 class="titulo">Movimientos del Día</h1>

    <div class="table-container">
        <h2>Entradas y Salidas - <?php echo $hoy; ?></h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['producto']; ?></td>
                        <td>
                            <span class="badge <?php echo strtolower($row['tipo']); ?>">
                                <?php echo ucfirst($row['tipo']); ?>
                            </span>
                        </td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
