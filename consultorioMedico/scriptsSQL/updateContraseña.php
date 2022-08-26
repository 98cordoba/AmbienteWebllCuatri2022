<?php
$idUsuarios = $_POST['idUsuarios'];
$passwordUsuario = $_POST['passwordUsuario'];
$stmt = $mysqli->prepare("Call spActualizaContraseña(?,?)");
$stmt->bind_param("si",$passwordUsuario,$idUsuarios);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>