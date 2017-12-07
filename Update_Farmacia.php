<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");

// pasa el contenido de mostrar_area
$data = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idproducto = mysqli_real_escape_string($conexion, $data->idproducto);
$nomproducto = mysqli_real_escape_string($conexion, $data->nomproducto);
$tipoproducto = mysqli_real_escape_string($conexion, $data->tipoproducto);
$existencia = mysqli_real_escape_string($conexion, $data->existencia);
$precio = mysqli_real_escape_string($conexion, $data->precio);
$visible = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query = "UPDATE farmacia SET idproducto='$idproducto',nomproducto='$nomproducto',tipoproducto='$tipoproducto',existencia='$existencia',precio='$precio',
visible='$visible' WHERE idproducto=$idproducto";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
