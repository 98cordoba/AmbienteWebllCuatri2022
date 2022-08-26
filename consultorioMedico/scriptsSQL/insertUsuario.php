<?php
require "../conexion/conexion.php"; #Conexion a la BD
$usuarioNombre = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['passwordUsuario'];
$tipoUsuario = $_POST['tipoUsuario'];
$stmt = $mysqli->prepare("Call spInsertarUsuario(?,?,?)");
$stmt->bind_param("ssi",$usuarioNombre,$passwordUsuario,$tipoUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>