<?php
require "../conexion/conexion.php";
function getArray($sql){
    //Creamos la conexión con la función anterior $conexion = connectDB();
    //generamos la consulta
    mysqli_set_charset($mysqli, "utf8"); //formato de datos utf8
    if(!$result = mysqli_query($mysqli, $sql)) die(); //si la conexión cancelar programa
    $rawdata = array(); //creamos un array
    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;
    while($row = mysqli_fetch_array($result)){
        $rawdata[$i] = $row;
        $i++;
    }
    //disconnectDB($conexion); //desconectamos la base de datos
    return $rawdata; //devolvemos el array
}
$elSQL = "Call spGetRoles()";
$myArray = getArray($elSQL);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
?>