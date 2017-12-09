<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");

// pasa el contenido de mostrar_area
$data = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idProducto = mysqli_real_escape_string($conexion, $data->idProducto);
$nomProducto = mysqli_real_escape_string($conexion, $data->nomProducto);
$tipoProducto = mysqli_real_escape_string($conexion, $data->tipoProducto);
$existencia = mysqli_real_escape_string($conexion, $data->existencia);
$precio = mysqli_real_escape_string($conexion, $data->precio);
$visible = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query = "UPDATE Farmacia SET idProducto='$idProducto',nomProducto='$nomProducto',tipoProducto='$tipoProducto',existencia='$existencia',precio='$precio',
visible='$visible' WHERE idProducto=$idProducto";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
