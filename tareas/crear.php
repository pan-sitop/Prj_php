<?php
include '../config/conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $proyecto_id=$_POST['proyecto_id'];
    $nombre=$_POST['nombre'];
    $asignado_a=$_POST['asignado_a'];
    $fecha_entrega=$_POST['fecha_entrega'];
    $estado_id=$_POST['estado_id'];
    $sql="INSERT INTO Tareas (proyecto_id,nombre,asignado_a,fecha_entrega,estado_id) VALUES (?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("isssi",$proyecto_id,$nombre,$asignado_a,$fecha_entrega,$estado_id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
$proyectos=$conn->query("SELECT * FROM Proyectos");
$estados=$conn->query("SELECT * FROM EstadosProyecto");
include '../includes/header.php';
?>
<h2 class="text-success mb-3">Nueva Tarea</h2>
<form action="crear.php" method="POST" class="w-50 card p-4">
    <div class="mb-3">
        <label class="form-label">Asignar al Proyecto:</label>
        <select name="proyecto_id" class="form-control" required>
            <?php while($p=$proyectos->fetch_assoc()){ ?>
                <option value="<?php echo $p['id']; ?>"><?php echo $p['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre de la Tarea:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Asignado a (Nombre del responsable):</label>
        <input type="text" name="asignado_a" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Entrega:</label>
        <input type="date" name="fecha_entrega" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado de la Tarea:</label>
        <select name="estado_id" class="form-control" required>
            <?php while($e=$estados->fetch_assoc()){ ?>
                <option value="<?php echo $e['id']; ?>"><?php echo $e['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Tarea</button>
</form>
<?php include '../includes/footer.php'; ?>