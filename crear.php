<?php
    include 'config/conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nombre=$_POST['nombre'];
        $descripcion=$_POST['descripcion'];
        $cliente_id=$_POST['cliente_id'];
        $estado_id=$_POST['estado_id'];
        $sql="INSERT INTO Proyectos (nombre,descripcion,cliente_id,estado_id) VALUES (?,?,?,?)";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssii",$nombre,$descripcion,$cliente_id,$estado_id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
    $clientes=$conn->query("SELECT * FROM Clientes");
    $estados=$conn->query("SELECT * FROM EstadosProyecto");
    include 'includes/header.php';
    ?>
    
    <h2 class="text-success mb-3">Crear Proyecto</h2>
    <form action="crear.php" method="POST" class="w-50 card p-4">
        <div class="mb-3">
            <label class="form-label">Nombre del Proyecto:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Cliente:</label>
            <select name="cliente_id" class="form-control" required>
                <?php while($c=$clientes->fetch_assoc()){ ?>
                    <option value="<?php echo $c['id']; ?>"><?php echo $c['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <select name="estado_id" class="form-control" required>
                <?php while($e=$estados->fetch_assoc()){ ?>
                    <option value="<?php echo $e['id']; ?>"><?php echo $e['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
<?php include 'includes/footer.php'; ?>