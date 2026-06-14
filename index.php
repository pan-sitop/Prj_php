<?php
include 'config/conexion.php';
include 'includes/header.php';
    $sql="SELECT p.id, p.nombre, p.descripcion, c.nombre AS cliente, e.nombre AS estado FROM Proyectos p JOIN Clientes c ON p.cliente_id=c.id JOIN EstadosProyecto e ON p.estado_id=e.id";
    $result=$conn->query($sql);
    ?>
    <h2 class="text-primary mb-3">Lista de Proyectos</h2>
    <a href="crear.php" class="btn btn-success mb-3">Nuevo Proyecto</a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr><th>ID</th><th>Proyecto</th><th>Descripción</th><th>Cliente</th><th>Estado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['cliente']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php include 'includes/footer.php'; ?>