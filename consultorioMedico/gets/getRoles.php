<?php

include "../conexion/conexion.php";
$elSQL = "Call spGetRoles()";
$myArray = getArray($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);

?>