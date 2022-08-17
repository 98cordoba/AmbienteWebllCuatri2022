<?php
require "../conexion/conexion.php"; #Conexion a la BD
$nombrePaciente = $_POST['pacienteNombre'];
$apellidoPaciente = $_POST['pacienteApellidos'];
$cedulaPaciente = $_POST['pacienteCedula'];
$fechaPaciente = $_POST['pacienteFechaN'];
$telefonoPaciente = $_POST['pacienteTelefono'];
$correoPaciente = $_POST['pacienteCorreo'];
$pacienteCita = $_POST['pacienteCita'];
$consultaIPaciente = "INSERT INTO pacientes (nombrePaciente,apellidosPaciente,cedulaPaciente,fechaNacimiento,telefonoPaciente,correoPaciente,citaPaciente) VALUES (?,?,?,?,?,?,?)";
$consultaPreparada =  mysqli_prepare($mysqli,$consultaIPaciente); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssisisi",$nombrePaciente,$apellidoPaciente,$cedulaPaciente,$fechaPaciente,$telefonoPaciente,$correoPaciente,$pacienteCita); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
      // $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$tUsuario); # Asociar las variables
      // mysqli_stmt_fetch($consultaPreparada); # Leer resultados
      echo '<script language="javascript">alert("Se ha incertado un registro en la tabla doctor");</script>';
      header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }else{#FALSE = LA CONSULTA NO SE EJECUTO
        echo '<script language="javascript">alert("Error al ejecutar la consulta");</script>';
        header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }
?>