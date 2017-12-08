<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_area
$data        = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idEmpleado  = mysqli_real_escape_string($conexion, $data->idEmpleado);
$horaEntrada      = mysqli_real_escape_string($conexion, $data->horaEntrada);
$horaSalida      = mysqli_real_escape_string($conexion, $data->horaSalida);
$bonificacion      = mysqli_real_escape_string($conexion, $data->bonificacion);
$visible     = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query       = "UPDATE RecursosHumanos SET horaEntrada='$horaEntrada',horaSalida='$horaSalida',bonificacion='$bonificacion',visible='$visible' WHERE idEmpleado=$idEmpleado";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
