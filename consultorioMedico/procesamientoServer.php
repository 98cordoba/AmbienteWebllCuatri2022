<?php

require 'conexion.php';
session_start();
if (!isset($_SESSION['idUsuarios'])) { #si no existe sesion activa redirecciona al login
  header("Location: index.php");
}
$idUsuario = $_SESSION['idUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];



?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Server
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css" title="Color">
</head>

<body>
  <?php
 function obtiene($var, $m = ""){
   if (!isset($_REQUEST[$var])) {
     $tmp = (is_array($m)) ? [] : "";
   } elseif (!is_array($_REQUEST[$var])) {
     $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
   } else {
     $tmp = $_REQUEST[$var];
       array_walk_recursive($tmp, function (&$valor) {
       $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
     });
   }
   return $tmp;
 }

  $nombreP           = obtiene("nombrePaciente");
  $apellidosP        = obtiene("apellidoPaciente");
  $cedulaP           = obtiene("cedulaPaciente");
  $fechaNacimientoP  = obtiene("fechaPaciente");
  $telefonoP         = obtiene("telefonoPaciente"); 
  $correoP           = obtiene("correoPaciente");
//-------------------------------------------------------------------
  $nombrePOk          = false;
  $apellidosPOk       = false;
  $cedulaPOk          = false;
  $fechaNacimientoPOk = false;
  $telefonoPOk        = false;
  $correoPOk          = false;
//--------------------------------------------------------------------

  if ($nombreP == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
  } else {
    $nombrePOk = true;
  }

  if ($apellidosP == "") {
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>\n";
    print "\n";
  } else {
    $apellidosPOk = true;
  }

  if ($cedulaP == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
  } else {
    $cedulaPOk = true;
  }

  if ($fechaNacimientoP == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
  } else {
    $fechaNacimientoPOk = true;
  }

  if ($telefonoP == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
  } else {
    $telefonoPOk = true;
  }

  if ($correoP == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
  } else {
    $correoPOk = true;
  }

  echo InsertaDatos($nombreP, $apellidosP, $cedulaP, $fechaNacimientoP, $telefonoP, $correoP);

  //----------------------------------------------------------------------------------------
function InsertaDatos($pNombreP, $pApellidosP, $pCedulaP, $pFechaNacimientoP, $pTelefonoP, $pCorreoP){
  $response = "";
  //$conn = Conecta();
  // prepare and bind
  $stmt = $mysqli->prepare("INSERT INTO pacientes (nombrePaciente, nombrePaciente, fechaNacimiento, telefonoPaciente, correoPaciente,citaPaciente) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("siiis", $inombreP, $iapellidosP, $icedulaP, $ifechaNacimientoP, $itelefonoP, $icorreoP);

  // set parameters and execute
  $inombreP = $pNombreP;
  $iapellidosP = $pApellidosP;
  $icedulaP = $pCedulaP;
  $ifechaNacimientoP = $pFechaNacimientoP;
  $itelefonoP = $pTelefonoP;
  $icorreoP= $pCorreoP;

  $stmt->execute(); #Realizar validacion

  $response = "Se almaceno el paciente satisfactoriamente";

  $stmt->close();
  $conn->close();

  return $response;
}
  ?>

  <p><a href="principal.php">Volver al dashboard.</a></p>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>

</html>