<?php
$idDoctor = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaDoctor(?)");
$stmt->bind_param("i", $idDoctor);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>