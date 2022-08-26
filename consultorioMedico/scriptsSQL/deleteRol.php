<?php
$idRol = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaRol(?)");
$stmt->bind_param("i", $idRol);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>