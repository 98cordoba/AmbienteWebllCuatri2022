<?php
require "../conexion/conexion.php"; #Conexion a la BD
$nombreEmpleado         = $_POST['empleadoNombre'];
$apellidosEmpleado      = $_POST['empleadoApellidos'];
$cedulaEmpleado         = $_POST['empleadoCedula'];
$telefonoEmpleado       = $_POST['empleadoTelefono'];
$correoEmpleado         = $_POST['empleadoCorreo'];
$especialidad           = $_POST['empleadoEspecialidad'];
$salario                = $_POST['empleadoSalario'];
$stmt = $mysqli->prepare("Call spInsertarEmpleado(?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssi",$nombreEmpleado,$apellidosEmpleado,$cedulaEmpleado,$telefonoEmpleado,$correoEmpleado,$especialidad,$salario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>