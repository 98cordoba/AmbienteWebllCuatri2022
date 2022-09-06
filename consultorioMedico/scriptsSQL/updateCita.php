<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$citaID = $_POST['citaID'];
$citaDescripcion = $_POST['descripcionCita'];
$citaFecha = $_POST['fechaCita'];
$docCita = $_POST['doc'];
$stmt = $mysqli->prepare("Call spActualizaCita(?,?,?,?)");
$stmt->bind_param("ssii",$citaFecha,$citaDescripcion,$docCita,$citaID);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>