<?php
require "../conexion/conexion.php"; #Conexion a la BD
$nombrePaciente     = $_POST['pacienteNombre'];
$apellidoPaciente   = $_POST['pacienteApellidos'];
$cedulaPaciente     = $_POST['pacienteCedula'];
$fechaPaciente      = $_POST['pacienteFechaN'];
$telefonoPaciente   = $_POST['pacienteTelefono'];
$correoPaciente     = $_POST['pacienteCorreo'];
$expediente         = $_POST['expediente'];
$stmt = $mysqli->prepare("Call spInsertarPaciente(?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssi",$nombrePaciente,$apellidoPaciente,$cedulaPaciente,$fechaPaciente,$telefonoPaciente,$correoPaciente,$expediente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>