<?php
    $mysqli = new mysqli("localhost", "root", "", "consultoriomedico"); #conexion a BD
    if ($mysqli->connect_error) {
        die("Error al Conectar con la Base de Datos: " . $mysqli->connect_error);
    } # manejo de errores
?>