<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_area
$data        = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idEmpleado  = mysqli_real_escape_string($conexion, $data->idEmpleado);
$idArea      = mysqli_real_escape_string($conexion, $data->idArea);
$visible     = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query       = "UPDATE recursoshumanos SET idArea='$idArea',visible='$visible' WHERE idEmpleado=$idEmpleado";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
