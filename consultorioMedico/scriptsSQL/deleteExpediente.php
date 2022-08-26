<?php
$idExpediente = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaExpediente(?)");
$stmt->bind_param("i", $idExpediente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>