<?php
require "../conexion/conexion.php"; #Conexion a la BD
$doctorNombre         = $_POST['doctorNombre'];
$doctorApellidos      = $_POST['doctorApellidos'];
$doctorCedula         = $_POST['doctorCedula'];
$doctorTelefono       = $_POST['doctorTelefono'];
$doctorCorreo         = $_POST['doctorCorreo'];
$doctorEspecialidad   = $_POST['doctorEspecialidad'];
$doctorTpUsuario      = $_POST['doctorTpUsuario'];
$stmt = $mysqli->prepare("Call spInsertarDoctor(?,?,?,?,?,?,?)");
$stmt->bind_param("ssisssi",$doctorNombre,$doctorApellidos,$doctorCedula,$doctorTelefono,$doctorCorreo,$doctorEspecialidad,$doctorTpUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>