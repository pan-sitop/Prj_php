<?php
    include '../config/conexion.php';
    $id=$_GET['id'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $cliente_id=$_POST['cliente_id'];
        $estado_id=$_POST['estado_id'];
        $sql="UPDATE Proyectos SET nombre=?, descripcion=?, cliente_id=?, estado_id=? WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssiii",$nombre,$descripcion,$cliente_id,$estado_id,$id);
        $stmt->execute();
        header("Location: ../proyectos/index.php");
        exit();
    }
    $sqlProy="SELECT * FROM Proyectos WHERE id=?";
    $stmtProy=$conn->prepare($sqlProy);
    $stmtProy->bind_param("i",$id);
    $stmtProy->execute();
    $proyecto=$stmtProy->get_result()->fetch_assoc();

    $clientes=$conn->query("SELECT * FROM Clientes");
    $estados=$conn->query("SELECT * FROM EstadosProyecto");
    include '../includes/header.php';
    ?>
    <h2 class="text-warning mb-3">Editar Proyecto</h2>
    <form action="../proyectos/editar.php?id=<?php echo $id; ?>" method="POST" class="w-50 card p-4">
        <div class="mb-3">
            <label class="form-label">Nombre del Proyecto:</label>
            <input type="text" name="nombre" value="<?php echo $proyecto['nombre']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control" required><?php echo $proyecto['descripcion']; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Cliente:</label>
            <select name="cliente_id" class="form-control" required>
                <?php while($c=$clientes->fetch_assoc()){ ?>
                    <option value="<?php echo $c['id']; ?>" <?php echo ($c['id']==$proyecto['cliente_id'])?'selected':''; ?>><?php echo $c['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <select name="estado_id" class="form-control" required>
                <?php while($e=$estados->fetch_assoc()){ ?>
                    <option value="<?php echo $e['id']; ?>" <?php echo ($e['id']==$proyecto['estado_id'])?'selected':''; ?>><?php echo $e['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
<?php include '../includes/footer.php'; ?>