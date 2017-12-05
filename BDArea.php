<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");

$result = mysqli_query($conexion,"SELECT * FROM area");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
    if($outp != "") 
    {
    	$outp .= ",";
    }
    $outp .= '{"nombre":"'  . $rs["nombre"] . '",';
    $outp .= '"descripcion":"'   . $rs["descripcion"]        . '",';
    $outp .= '"visible":"'. $rs["visible"]     . '",' ;
    $outp .= '"id":"'. $rs["idArea"]     . '"}';
}
$outp ='{"datos":['.$outp.']}';

echo($outp);
?>