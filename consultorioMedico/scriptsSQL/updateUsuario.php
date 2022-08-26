<?php
require "../conexion/conexion.php"; #Conexion a la BD
$idUsuarios = $_POST['idUser'];
$nombreUsuario = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['usuarioPw'];
$tipoUsuario = $_POST['tipoUsuario'];
$stmt = $mysqli->prepare("Call spActualizaUsuario(?,?,?,?)");
$stmt->bind_param("ssii",$nombreUsuario,$passwordUsuario,$tipoUsuario,$idUsuarios);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>