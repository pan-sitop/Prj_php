<?php
    include '../config/conexion.php';
    $id=$_GET['id'];
    $sql="DELETE FROM Proyectos WHERE id=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    header("Location: ../proyectos/index.php");
    exit();
?>