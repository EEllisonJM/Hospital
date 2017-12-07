<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_Producto
$data        = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$id          = mysqli_real_escape_string($conexion, $data->id);
$nomProducto      = mysqli_real_escape_string($conexion, $data->nomProducto);
$tipoProducto = mysqli_real_escape_string($conexion, $data->tipoProducto);
$visible     = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query       = "UPDATE Farmacia SET nomProducto='$nomProducto',tipoProducto='$tipoProducto',visible='$visible' WHERE idProducto=$id";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
