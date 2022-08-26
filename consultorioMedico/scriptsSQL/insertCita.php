<?php
require "../conexion/conexion.php"; #Conexion a la BD
$citaFecha = $_POST['fechaCita'];
$citaDescripcion = $_POST['descripcionCita'];
$docCita = $_POST['citaDoc'];
$citaPaciente = $_POST['pacienteCita'];
$stmt = $mysqli->prepare("Call spInsertarCita(?,?,?,?,?)");
$stmt->bind_param("ssiii",$citaFecha,$citaDescripcion,$docCita,$citaID, $citaPaciente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>