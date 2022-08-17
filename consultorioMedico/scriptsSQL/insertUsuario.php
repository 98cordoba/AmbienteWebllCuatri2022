<?php
require "../conexion/conexion.php"; #Conexion a la BD
$usuarioNombre = $_POST['usuarioNombre'];
$passwordUsuario = $_POST['passwordUsuario'];
$tipoUsuario = $_POST['tipoUsuario'];
$consultaIUsuario = "INSERT INTO usuarios (nombreUsuario,passwordUsuario,tipoUsuario) VALUES (?,?,?)";
$consultaPreparada =  mysqli_prepare($mysqli,$consultaIUsuario); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"ssi",$usuarioNombre,$passwordUsuario,$tipoUsuario); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
      // $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$tUsuario); # Asociar las variables
      // mysqli_stmt_fetch($consultaPreparada); # Leer resultados
      echo '<script language="javascript">alert("Se ha incertado un registro en la tabla Usuarios");</script>';
      header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }else{#FALSE = LA CONSULTA NO SE EJECUTO
        echo '<script language="javascript">alert("Error al ejecutar la consulta");</script>';
        header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
    }
?>