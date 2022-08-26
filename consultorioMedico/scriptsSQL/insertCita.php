<?php
require "../conexion/conexion.php"; #Conexion a la BD
$citaFecha = $_POST['fechaCita'];
$citaDescripcion = $_POST['descripcionCita'];
$docCita = $_POST['citaDoc'];
$citaPaciente = $_POST['pacienteCita'];
$consultaICita = "INSERT INTO cita (fechaCita,descripcion,doctorAsignado,cidPaciente) VALUES (?,?,?,?)";
$consultaPreparada =  mysqli_prepare($mysqli,$consultaICita); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssii",$citaFecha,$citaDescripcion,$docCita,$citaPaciente); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
      // $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$tUsuario); # Asociar las variables
      // mysqli_stmt_fetch($consultaPreparada); # Leer resultados
      echo '<script language="javascript">alert("Se ha incertado un registro en la tabla citas");</script>';
      header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }else{#FALSE = LA CONSULTA NO SE EJECUTO
        echo '<script language="javascript">alert("Error al ejecutar la consulta");</script>';
        header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }
?>