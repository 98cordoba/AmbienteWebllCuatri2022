<?php
$idPaciente = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaPaciente(?)");
$stmt->bind_param("i", $idPaciente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>