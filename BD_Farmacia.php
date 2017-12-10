<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");

$result = mysqli_query($conexion,"SELECT * FROM Farmacia");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
    if($outp != "")
    {
    	$outp .= ",";
    }
    $outp .= '{"idProducto":"'  . $rs["idProducto"] . '",';
    $outp .= '"nomProducto":"'   . $rs["nomProducto"]        . '",';
    $outp .= '"tipoProducto":"'. $rs["tipoProducto"]     . '",' ;
    $outp .= '"existencia":"'. $rs["existencia"]     . '",' ;
    $outp .= '"precio":"'. $rs["precio"]     . '",' ;
    $outp .= '"visible":"'. $rs["visible"]     . '"}';

}
$outp ='{"datos":['.$outp.']}';

echo($outp);
?>
