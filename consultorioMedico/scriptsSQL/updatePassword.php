<?php
require "../conexion/conexion.php"; #Conexion a la BD
$idUsuarios = $_POST['idUser'];
$passwordUsuario = $_POST['passwd'];
$stmt = $mysqli->prepare("Call spActualizaContraseña(?,?)");
$stmt->bind_param("si",$passwordUsuario,$idUsuarios);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>