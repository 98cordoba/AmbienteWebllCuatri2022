<?php
require '../conexion/conexion.php';
function ConsultaSQL($elQuery){
    $conexion = $mysqli;
    if (!$conexion->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
    } else {
        //printf("Conjunto de caracteres actual: %s\n", $conexion->character_set_name());
    }
    $queryDevuelto = $conexion->query($elQuery);
    return $queryDevuelto;
}
?>