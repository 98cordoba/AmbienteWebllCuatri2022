<?php
$idUsuario = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaUsuario(?)");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>