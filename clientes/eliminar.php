<?php
include '../config/conexion.php';
$id=$_GET['id'];
$sql="DELETE FROM Clientes WHERE id=$id";
$conn->query($sql);
header("Location: ../clientes/index.php");
?>