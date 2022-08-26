<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$idRol = $_POST['id'];
$tipoDeUsuario = $_POST['tipoDeUsuario'];
$stmt = $mysqli->prepare("Call spActualizaRol(?,?)");
$stmt->bind_param("ii",$tipoDeUsuario,$idRol);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>