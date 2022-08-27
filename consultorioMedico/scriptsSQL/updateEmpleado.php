<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$idEmpleado             = $_POST['doctorID'];
$nombreEmpleado         = $_POST['doctorNombre'];
$apellidosEmpleado      = $_POST['doctorApellidos'];
$cedulaEmpleado         = $_POST['doctorCedula'];
$telefonoEmpleado       = $_POST['doctorTelefono'];
$correoEmpleado         = $_POST['doctorCorreo'];
$especialidad           = $_POST['doctorEspecialidad'];
$salario                = $_POST['doctorTpUsuario'];
$rol                    = $_POST['doctorTpUsuario'];
$stmt = $mysqli->prepare("Call spActualizaDoctor(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssiii",$nombreEmpleado,$apellidosEmpleado,$cedulaEmpleado,$telefonoEmpleado,$correoEmpleado,$especialidad,$salario,$rol,$doctorID);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>