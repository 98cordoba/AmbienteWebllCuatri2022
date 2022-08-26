<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$idExpediente = $_POST['idExpediente'];
$citaDescripcion = $_POST['exPaciente'];
$exDoctor = $_POST['exDoctor'];
$exConsulta = $_POST['exConsulta'];
$stmt = $mysqli->prepare("Call spActualizaExpediente(?,?,?,?)");
$stmt->bind_param("iiii",$citaDescripcion,$citaDescripcion,$docCita,$idExpediente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>