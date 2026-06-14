<?php
    include 'config/conexion.php';
    include 'includes/header.php';

    $sql="SELECT p.nombre AS proyecto, t.nombre AS tarea, t.asignado_a, t.fecha_entrega, e.nombre AS estado_tarea FROM Tareas t JOIN Proyectos p ON t.proyecto_id=p.id JOIN EstadosProyecto e ON t.estado_id=e.id";
    $result=$conn->query($sql);
    ?>
    <h2 class="text-info mb-3">Consulta 2: Detalle de Tareas por Proyecto</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr><th>Proyecto</th><th>Tarea</th><th>Asignado A</th><th>Fecha de Entrega</th><th>Estado de Tarea</th></tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['proyecto']; ?></td>
                <td><?php echo $row['tarea']; ?></td>
                <td><?php echo $row['asignado_a']; ?></td>
                <td><?php echo date("d/m/Y", strtotime($row['fecha_entrega'])); ?></td>
                <td><?php echo $row['estado_tarea']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php include 'includes/footer.php'; ?>