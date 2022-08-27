<?php
$idUsuario = $_POST['idUser'];
$passwordUsuario = $_POST['passwordUsuario'];
$stmt = $mysqli->prepare("Call spActualizaContraseña(?,?)");
$stmt->bind_param("si",$passwordUsuario,$idUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>