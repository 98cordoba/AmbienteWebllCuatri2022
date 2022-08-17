<?php
session_start(); #Necesario para utilizar sesiones
session_destroy(); #Elimina la sesion
header("Location: ./index.php"); #Redirecciona a Login
?>