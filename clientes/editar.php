<?php
include '../config/conexion.php';
include '../includes/header.php';
$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nom=$_POST['nombre'];
    $cont=$_POST['contacto'];
    $sql="UPDATE Clientes SET nombre='$nom', contacto='$cont' WHERE id=$id";
    $conn->query($sql);
    echo "<script>window.location.href='index.php';</script>";
}

$sql_cli="SELECT * FROM Clientes WHERE id=$id";
$cliente=$conn->query($sql_cli)->fetch_assoc();
?>
<h2 class="text-warning mb-3">Editar Cliente</h2>
<form action="editar.php?id=<?php echo $id; ?>" method="POST" class="w-50 card p-4">
    <div class="mb-3">
        <label class="form-label">Nombre de la Empresa o Cliente:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contacto (Email/Teléfono):</label>
        <input type="text" name="contacto" value="<?php echo $cliente['contacto']; ?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Cliente</button>
</form>
<?php include '../includes/footer.php'; ?>