<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$doctorID           = $_POST['doctorID'];
$doctorNombre       = $_POST['doctorNombre'];
$doctorApellidos    = $_POST['doctorApellidos'];
$doctorCedula       = $_POST['doctorCedula'];
$doctorTelefono     = $_POST['doctorTelefono'];
$doctorCorreo       = $_POST['doctorCorreo'];
$doctorEspecialidad = $_POST['doctorEspecialidad'];
$doctorTpUsuario    = $_POST['doctorTpUsuario'];
$stmt = $mysqli->prepare("Call spActualizaDoctor(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssisssii",$doctorNombre,$doctorApellidos,$doctorCedula,$doctorTelefono,$doctorCorreo,$doctorEspecialidad,$doctorTpUsuario,$doctorID);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>