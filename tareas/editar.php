<?php
include '../config/conexion.php';
include '../includes/header.php';
$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $proy=$_POST['proyecto_id'];
    $nom=$_POST['nombre'];
    $asig=$_POST['asignado_a'];
    $fec=$_POST['fecha_entrega'];
    $est=$_POST['estado_id'];
    $sql="UPDATE Tareas SET proyecto_id=$proy, nombre='$nom', asignado_a='$asig', fecha_entrega='$fec', estado_id=$est WHERE id=$id";
    $conn->query($sql);
    echo "<script>window.location.href='index.php';</script>";
}

$sql_tar="SELECT * FROM Tareas WHERE id=$id";
$tarea=$conn->query($sql_tar)->fetch_assoc();
$proyectos=$conn->query("SELECT * FROM Proyectos");
$estados=$conn->query("SELECT * FROM EstadosProyecto");
?>
<h2 class="text-warning mb-3">Editar Tarea</h2>
<form action="editar.php?id=<?php echo $id; ?>" method="POST" class="w-50 card p-4">
    <div class="mb-3">
        <label class="form-label">Asignar al Proyecto:</label>
        <select name="proyecto_id" class="form-control" required>
            <?php while($p=$proyectos->fetch_assoc()){ ?>
                <option value="<?php echo $p['id']; ?>" <?php if($p['id']==$tarea['proyecto_id']) echo 'selected'; ?>><?php echo $p['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre de la Tarea:</label>
        <input type="text" name="nombre" value="<?php echo $tarea['nombre']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Asignado a (Nombre del responsable):</label>
        <input type="text" name="asignado_a" value="<?php echo $tarea['asignado_a']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Entrega:</label>
        <input type="date" name="fecha_entrega" value="<?php echo date('Y-m-d', strtotime($tarea['fecha_entrega'])); ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Estado de la Tarea:</label>
        <select name="estado_id" class="form-control" required>
            <?php while($e=$estados->fetch_assoc()){ ?>
                <option value="<?php echo $e['id']; ?>" <?php if($e['id']==$tarea['estado_id']) echo 'selected'; ?>><?php echo $e['nombre']; ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Tarea</button>
</form>
<?php include '../includes/footer.php'; ?>