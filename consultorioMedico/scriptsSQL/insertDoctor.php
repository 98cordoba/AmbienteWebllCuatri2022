<?php
require "../conexion/conexion.php"; #Conexion a la BD
$doctorNombre = $_POST['doctorNombre'];
$doctorApellidos = $_POST['doctorApellidos'];
$doctorCedula = $_POST['doctorCedula'];
$doctorTelefono = $_POST['doctorTelefono'];
$doctorCorreo = $_POST['doctorCorreo'];
$doctorEspecialidad = $_POST['doctorEspecialidad'];
$doctorTpUsuario = $_POST['doctorTpUsuario'];
$consultaIDoctor = "INSERT INTO doctor (nombreDoctor,apellidosDoctor,cedulaDoctor,telefonoDoctor,correoDoctor,especialidad,tipoUsuario) VALUES (?,?,?,?,?,?,?)";
$consultaPreparada =  mysqli_prepare($mysqli,$consultaIDoctor); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssiissi",$doctorNombre,$doctorApellidos,$doctorCedula,$doctorTelefono,$doctorCorreo,$doctorEspecialidad,$doctorTpUsuario); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
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