<?php
require "../conexion/conexion.php"; #Conexion a la BD
$nombreEmpleado         = $_POST['doctorNombre'];
$apellidosEmpleado      = $_POST['doctorApellidos'];
$cedulaEmpleado         = $_POST['doctorCedula'];
$telefonoEmpleado       = $_POST['doctorTelefono'];
$correoEmpleado         = $_POST['doctorCorreo'];
$especialidad           = $_POST['doctorEspecialidad'];
$salario                = $_POST['doctorSalario'];
$stmt = $mysqli->prepare("Call spInsertarEmpleado(?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssi",$nombreEmpleado,$apellidosEmpleado,$cedulaEmpleado,$telefonoEmpleado,$correoEmpleado,$especialidad,$salario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>