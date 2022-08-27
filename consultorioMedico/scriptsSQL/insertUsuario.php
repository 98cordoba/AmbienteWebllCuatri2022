<?php
require "../conexion/conexion.php"; #Conexion a la BD
$usuarioNombre = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['passwordUsuario'];
$rolUsuario = $_POST['tipoUsuario'];
$stmt = $mysqli->prepare("Call spInsertarUsuario(?,?,?)");
$stmt->bind_param("ssi",$usuarioNombre,$passwordUsuario,$rolUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>