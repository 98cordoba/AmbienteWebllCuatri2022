<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$exPaciente = $_POST['exPaciente'];
$exDoctor = $_POST['exDoctor'];
$exConsulta = $_POST['exConsulta'];
$stmt = $mysqli->prepare("Call spInsertarExpediente(?,?,?)");
$stmt->bind_param("iii",$exPaciente,$exDoctor,$exConsulta);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>