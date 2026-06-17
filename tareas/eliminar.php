<?php
include '../config/conexion.php';
$id=$_GET['id'];
$sql="DELETE FROM Tareas WHERE id=$id";
$conn->query($sql);
header("Location: index.php");
?>