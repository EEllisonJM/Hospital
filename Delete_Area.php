<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");


// pasa el contenido de mostrar_area
$data = json_decode(file_get_contents("php://input"));

//$query = "DELETE FROM area WHERE id_area=$data->id";
$query = "UPDATE area set visible = 0 WHERE id_area=$data->id";
//$act = "UPDATE Area set visible = 0 WHERE id_area = ".$_REQUEST["id"]."";
mysqli_query($conexion, $query);
echo "Eliminado";
?>
