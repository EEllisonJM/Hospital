<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");
// pasa el contenido de mostrar_Farmacia
$data = json_decode(file_get_contents("php://input"));

//$id = mysqli_real_escape_string($conexion, $data->id);
//$query = "DELETE FROM Farmacia WHERE id_Farmacia=$data->id";
$query = "UPDATE Farmacia set visible = 0 WHERE idProducto=$data->id";
//$query = "UPDATE Farmacia set visible = 0 WHERE idFarmacia=$id";
//$act = "UPDATE Farmacia set visible = 0 WHERE id_Farmacia = ".$_REQUEST["id"]."";
mysqli_query($conexion, $query);
echo "Eliminado";
?>
