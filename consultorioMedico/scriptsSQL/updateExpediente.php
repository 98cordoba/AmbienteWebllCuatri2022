<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$idExpediente = $_POST['idExpediente'];
$exPaciente = $_POST['exPaciente'];
$exDoctor = $_POST['exDoctor'];
$exConsulta = $_POST['exConsulta'];
$stmt = $mysqli->prepare("Call spActualizaExpediente(?,?,?,?)");
$stmt->bind_param("iiii",$exPaciente,$exDoctor,$exConsulta,$idExpediente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>