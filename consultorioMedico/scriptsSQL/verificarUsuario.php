<?php
#Pensar en cambiar metodo post por get ya que unicamente es consulta
require "../conexion/conexion.php"; #Conexion a la BD
session_start(); #Necesario para utilizar sesiones 
$usuario = $_POST['usuario']; #atributo name del form
$contraseña = $_POST['contraseñaUsuario']; #atributo name del form
$consultaUsuario = "SELECT idUsuarios, nombreUsuario, passwordUsuario, tipoUsuario FROM usuarios WHERE nombreUsuario= ?"; #Consulta del Usuario
$consultaPreparada =  mysqli_prepare($mysqli,$consultaUsuario); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"s",$usuario); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
       $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$tUsuario); # Asociar las variables
       mysqli_stmt_fetch($consultaPreparada); # Leer resultados
        if ($usuario == $Username) {  #Comparacion de usuarios 
            if($password_bd == $contraseña){ #Comparacion de contraseñas
                #almacenamiento de datos en variables de sesiones
                $_SESSION['idUsuarios'] = $idUser;
                $_SESSION['nombreUsuario'] = $Username;
                $_SESSION['passwordUsuario'] = $password_bd;
                $_SESSION['tipoUsuario'] = $tUsuario;
                header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
            }else{
                echo "contraseña no coincide"; #Contraseña incorrecta
            }
        }else{
            header("Location: ../errores/404.html"); #Redireccionamiento a error 500
        }
    }else{
        echo "Error al ejecutar la consulta"; #FALSE = LA CONSULTA NO SE EJECUTO
    }
?>