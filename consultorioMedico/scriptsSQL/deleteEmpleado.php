<?php
$idEmpleado = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaEmpleado(?)");
$stmt->bind_param("i", $idEmpleado);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>