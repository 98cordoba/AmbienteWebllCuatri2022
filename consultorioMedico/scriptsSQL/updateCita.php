<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$citaID = $_POST['citaID'];
$citaDescripcion = $_POST['descripcionCita'];
$citaFecha = $_POST['fechaCita'];
$docCita = $_POST['citaDoc'];
$citaPaciente = $_POST['pacienteCita'];
$stmt = $mysqli->prepare("Call spActualizaCita(?,?,?,?,?)");
$stmt->bind_param("ssiii",$citaFecha,$citaDescripcion,$docCita,$citaPaciente,$citaID);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>