<?php
include '../config/conexion.php';
include '../includes/header.php';
$sql="SELECT t.id, t.nombre, t.asignado_a, t.fecha_entrega, p.nombre AS proyecto, e.nombre AS estado FROM Tareas t JOIN Proyectos p ON t.proyecto_id=p.id JOIN EstadosProyecto e ON t.estado_id=e.id";
$result=$conn->query($sql);
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 text-primary">Lista de Tareas</h3>
    <a href="crear.php" class="btn btn-primary shadow-sm"><i class="bi bi-plus-lg"></i> Nueva Tarea</a>
</div>
<div class="card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Tarea</th>
                    <th class="py-3 px-4">Proyecto</th>
                    <th class="py-3 px-4">Responsable</th>
                    <th class="py-3 px-4">Entrega</th>
                    <th class="py-3 px-4">Estado</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td class="px-4 text-muted">#<?php echo $row['id']; ?></td>
                    <td class="px-4 fw-semibold"><i class="bi bi-check2-square text-success me-2"></i><?php echo $row['nombre']; ?></td>
                    <td class="px-4"><?php echo $row['proyecto']; ?></td>
                    <td class="px-4"><?php echo $row['asignado_a']; ?></td>
                    <td class="px-4"><?php echo $row['fecha_entrega']; ?></td>
                    <td class="px-4"><span class="badge bg-secondary"><?php echo $row['estado']; ?></span></td>
                    <td class="px-4 text-center">
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-warning border-0"><i class="bi bi-pencil-square"></i></a>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('¿Eliminar tarea?');"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>