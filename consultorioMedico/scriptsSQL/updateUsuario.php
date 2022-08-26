<?php
$idUsuarios = $_POST['idUsuarios'];
$nombreUsuario = $_POST['nombreUsuario'];
$passwordUsuario = $_POST['passwordUsuario'];
$tipoUsuario = $_POST['tipoUsuario'];
$stmt = $mysqli->prepare("Call spActualizaUsuario(?,?,?,?)");
$stmt->bind_param("ssii",$nombreUsuario,$passwordUsuario,$tipoUsuario,$idUsuarios);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>