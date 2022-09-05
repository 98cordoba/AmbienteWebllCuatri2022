<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$idEmpleado             = $_POST['empleadoID'];
$nombreEmpleado         = $_POST['empleadoNombre'];
$apellidosEmpleado      = $_POST['empleadoApellidos'];
$cedulaEmpleado         = $_POST['empleadoCedula'];
$telefonoEmpleado       = $_POST['empleadoTelefono'];
$correoEmpleado         = $_POST['empleadoCorreo'];
$especialidad           = $_POST['empleadoEspecialidad'];
$salario                = $_POST['empleadoSalario'];
$user                   = $_POST['user'];
$stmt = $mysqli->prepare("Call spActualizaEmpleado(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssiii",$nombreEmpleado,$apellidosEmpleado,$cedulaEmpleado,$telefonoEmpleado,$correoEmpleado,$especialidad,$salario,$user,$idEmpleado);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>