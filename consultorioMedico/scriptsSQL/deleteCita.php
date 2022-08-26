<?php
$idCita = $_GET['id'];
require "../conexion/conexion.php"; #Conexion a la BD
$stmt = $mysqli->prepare("Call spEliminaCita(?)");
$stmt->bind_param("i", $idCita);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php");
?>