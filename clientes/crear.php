<?php
include '../config/conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=$_POST['nombre'];
    $contacto=$_POST['contacto'];
    $sql="INSERT INTO Clientes (nombre,contacto) VALUES (?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss",$nombre,$contacto);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
include '../includes/header.php';
?>
<h2 class="text-success mb-3">Nuevo Cliente</h2>
<form action="crear.php" method="POST" class="w-50 card p-4">
    <div class="mb-3">
        <label class="form-label">Nombre de la Empresa o Cliente:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contacto (Email/Teléfono):</label>
        <input type="text" name="contacto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Cliente</button>
</form>
<?php include '../includes/footer.php'; ?>