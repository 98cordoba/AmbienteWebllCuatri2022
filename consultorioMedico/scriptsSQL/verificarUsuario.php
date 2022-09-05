<?php
require "../conexion/conexion.php"; #Conexion a la BD
session_start(); #Necesario para utilizar sesiones 
$usuario = $_POST['usuario']; #atributo name del form
$contraseña = $_POST['contraseñaUsuario']; #atributo name del form
$consultaUsuario = "SELECT idUsuario, nombreUsuario, passwordUsuario, rol FROM usuarios WHERE nombreUsuario= ?"; #Consulta del Usuario
$consultaPreparada =  mysqli_prepare($mysqli,$consultaUsuario); #Se prepara la consulta ***[Devuelve un objeto mysqli_stmt]***
$estadoConsulta = mysqli_stmt_bind_param($consultaPreparada,"s",$usuario); #Parametro enviado en el WHERE (Objeto mysqli_stmt,Tipo de dato por consultar,Dato consultado)
$estadoConsulta = mysqli_stmt_execute($consultaPreparada);  #Se ejecuta la consulta   ***[Devuelve TRUE/FALSE]***
    if($estadoConsulta==true){ #TRUE = la consulta se ejecuto
       $estadoConsulta = mysqli_stmt_bind_result($consultaPreparada,$idUser,$Username,$password_bd,$rolUsuario); # Asociar las variables
       mysqli_stmt_fetch($consultaPreparada); # Leer resultados
        if ($usuario == $Username) {  #Comparacion de usuarios 
            if($password_bd == $contraseña){ #Comparacion de contraseñas
                #almacenamiento de datos en variables de sesiones
                $_SESSION['idUsuario'] = $idUser;
                $_SESSION['nombreUsuario'] = $Username;
                $_SESSION['passwordUsuario'] = $password_bd;
                $_SESSION['rol'] = $rolUsuario;
                header("Location: ../principal.php"); #Redireccionamiento a la pantalla principal
            }else{
                header("Location: ../errores/401.html");  #Contraseña incorrecta
            }
        }else{
            header("Location: ../errores/401.html");
        }
    }else{
        header("Location: ../errores/404.html"); #FALSE = LA CONSULTA NO SE EJECUTO
    }
?>