<?php
require "../conexion/conexion.php"; #Conexion a la BD
$citaFecha = $_POST['fechaCita'];
$citaDescripcion = $_POST['descripcionCita'];
$docCita = $_POST['doc'];
$citaPaciente = $_POST['PacienteID'];
$stmt = $mysqli->prepare("Call spInsertarCita(?,?,?,?)");
$stmt->bind_param("ssii",$citaFecha,$citaDescripcion,$docCita,$citaPaciente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>