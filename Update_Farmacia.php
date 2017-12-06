<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_Farmacia
$data        = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$id          = mysqli_real_escape_string($conexion, $data->id);
$nombre      = mysqli_real_escape_string($conexion, $data->nombre);
$tipoProducto = mysqli_real_escape_string($conexion, $data->tipoProducto);
$existencia = mysqli_real_escape_string($conexion, $data->existencia);
$precio = mysqli_real_escape_string($conexion, $data->precio);
$visible     = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query       = "UPDATE Farmacia SET nomProducto='$nombre', tipoProducto='$tipoProducto',existencia='$existencia',precio='$precio', visible='$visible' WHERE idProducto=$id";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
