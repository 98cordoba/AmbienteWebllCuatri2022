<?php
require "../conexion/conexion.php"; #Conexion a la BD
$idUsuario = $_POST['idUser'];
$nombreUsuario = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['usuarioPw'];
$rol = $_POST['rol'];
$stmt = $mysqli->prepare("Call spActualizaUsuario(?,?,?,?)");
$stmt->bind_param("ssii",$nombreUsuario,$passwordUsuario,$rol,$idUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>