<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$IDPaciente = $_POST['pacienteID'];
$nombrePaciente = $_POST['pacienteNombre'];
$apellidoPaciente = $_POST['pacienteApellidos'];
$cedulaPaciente = $_POST['pacienteCedula'];
$fechaPaciente = $_POST['pacienteFechaN'];
$telefonoPaciente = $_POST['pacienteTelefono'];
$correoPaciente = $_POST['pacienteCorreo'];
$stmt = $mysqli->prepare("Call spActualizaPaciente(?,?,?,?,?,?,?)");
$stmt->bind_param("ssisssi",$nombrePaciente,$apellidoPaciente,$cedulaPaciente,$fechaPaciente,$telefonoPaciente,$correoPaciente,$IDPaciente);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>