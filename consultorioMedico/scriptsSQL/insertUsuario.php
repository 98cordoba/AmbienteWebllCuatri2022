<?php
require "../conexion/conexion.php"; #Conexion a la BD
$usuarioNombre = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['passwordUsuario'];
<<<<<<< Updated upstream
$rolUsuario = $_POST['tipoUsuario'];
=======
$tipoUsuario = $_POST['rol'];
>>>>>>> Stashed changes
$stmt = $mysqli->prepare("Call spInsertarUsuario(?,?,?)");
$stmt->bind_param("ssi",$usuarioNombre,$passwordUsuario,$rolUsuario);
$stmt->execute();
$stmt->close();
header("Location: ../principal.php"); 
?>