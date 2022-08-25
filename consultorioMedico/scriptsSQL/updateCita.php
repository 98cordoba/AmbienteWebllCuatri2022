<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$citaID = $_POST['citaID'];
$citaDescripcion = $_POST['descripcionCita'];
$citaFecha = $_POST['fechaCita'];
$docCita = $_POST['citaDoc'];
$citaPaciente = $_POST['pacienteCita'];
 
$consultaUDoctor = "UPDATE cita SET fechaCita = ?, descripcion = ?, doctorAsignado = ?, cidPaciente = ? WHERE idDoctor = ?";

$consultaPreparada =  mysqli_prepare($mysqli,$consultaUDoctor); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssiii",$citaFecha,$citaDescripcion,$docCita,$citaID, $citaPaciente);
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
      // $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$tUsuario); # Asociar las variables
      // mysqli_stmt_fetch($consultaPreparada); # Leer resultados
      echo "<script language='text/javascript'>alert('Se ha modificado un registro en la tabla doctor');</script>";
      header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }else{#FALSE = LA CONSULTA NO SE EJECUTO
        echo '<script language="javascript">alert("Error al ejecutar la consulta");</script>';
        header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }
?>