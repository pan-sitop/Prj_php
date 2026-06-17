<?php
    include '../config/conexion.php';
    include '../includes/header.php';

    $sql="SELECT c.nombre AS cliente, COUNT(p.id) AS total_proyectos FROM Clientes c LEFT JOIN Proyectos p ON c.id=p.cliente_id GROUP BY c.id";
    $result=$conn->query($sql);
    ?>
    <h2 class="text-info mb-3">Consulta 1: Total de Proyectos por Cliente</h2>
    <table class="table table-bordered table-hover w-50">
        <thead class="table-dark">
            <tr><th>Cliente</th><th>Total Proyectos</th></tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
            <tr><td><?php echo $row['cliente']; ?></td><td><?php echo $row['total_proyectos']; ?></td></tr>
        <?php } ?>
        </tbody>
    </table>
<?php include '../includes/footer.php'; ?>