<?php
require "../conexion/conexion.php"; #Conexion a la BD
$rol = $_POST['tipoDeUsuario'];
$stmt = $mysqli->prepare("Call spInsertarRol(?)");
$stmt->bind_param("s",$rol);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>