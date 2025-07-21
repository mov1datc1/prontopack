<?php
include 'includes/conexion.php';
include 'includes/sidebar.php';

// Obtener todas las solicitudes
$res = mysqli_query($conn, "SELECT * FROM solicitudes ORDER BY estatus, id DESC");
?>

<div class="content">
    <h1 class="titulo">Seguimiento de Solicitudes</h1>

    <div class="table-container">
        <h2>Solicitudes por Estatus</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Solicitante</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td>
                            <span class="badge <?php echo $row['estatus']; ?>">
                                <?php echo ucfirst($row['estatus']); ?>
                            </span>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
