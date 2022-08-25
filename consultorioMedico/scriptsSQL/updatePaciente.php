<?php 
require "../conexion/conexion.php"; #Conexion a la BD
$IDPaciente = $_POST['pacienteID'];
$nombrePaciente = $_POST['pacienteNombre'];
$apellidoPaciente = $_POST['pacienteApellidos'];
$cedulaPaciente = $_POST['pacienteCedula'];
$fechaPaciente = $_POST['pacienteFechaN'];
$telefonoPaciente = $_POST['pacienteTelefono'];
$correoPaciente = $_POST['pacienteCorreo'];
$consultaUPaciente = "UPDATE pacientes SET nombrePaciente = ?, apellidosPaciente = ?, cedulaPaciente = ?, fechaNacimiento = ?, telefonoPaciente = ?, correoPaciente = ? WHERE idPaciente = ?";
$consultaPreparada =  mysqli_prepare($mysqli,$consultaUPaciente); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssisisi",$nombrePaciente,$apellidoPaciente,$cedulaPaciente,$fechaPaciente,$telefonoPaciente,$correoPaciente,$IDPaciente);
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