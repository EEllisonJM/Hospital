<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_area
$data        = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$id          = mysqli_real_escape_string($conexion, $data->id);
$nombre      = mysqli_real_escape_string($conexion, $data->nombre);
$descripcion = mysqli_real_escape_string($conexion, $data->descripcion);
$visible     = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query       = "UPDATE area SET nombre='$nombre',descripcion='$descripcion',visible='$visible' WHERE idArea=$id";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
