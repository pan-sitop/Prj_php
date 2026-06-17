<?php
include '../config/conexion.php';
include '../includes/header.php';
$sql="SELECT * FROM Clientes";
$result=$conn->query($sql);
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 text-primary">Lista de Clientes</h3>
    <a href="../clientes/crear.php" class="btn btn-primary shadow-sm"><i class="bi bi-plus-lg"></i> Nuevo Cliente</a>
</div>
<div class="card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Nombre</th>
                    <th class="py-3 px-4">Contacto</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td class="px-4 text-muted">#<?php echo $row['id']; ?></td>
                    <td class="px-4 fw-semibold"><i class="bi bi-person-badge text-primary me-2"></i><?php echo $row['nombre']; ?></td>
                    <td class="px-4"><?php echo $row['contacto']; ?></td>
                    <td class="px-4 text-center">
                        <a href="../clientes/editar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-warning border-0"><i class="bi bi-pencil-square"></i></a>
                        <a href="../clientes/eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('¿Eliminar cliente?');"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>