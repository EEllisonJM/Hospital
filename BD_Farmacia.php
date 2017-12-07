<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");

$result = mysqli_query($conexion,"SELECT * FROM farmacia");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
    if($outp != "")
    {
    	$outp .= ",";
    }
    $outp .= '{"idproducto":"'  . $rs["idproducto"] . '",';
    $outp .= '"nomproducto":"'   . $rs["nomproducto"]        . '",';
    $outp .= '"tipoproducto":"'. $rs["tipoproducto"]     . '",' ;
    $outp .= '"existencia":"'. $rs["existencia"]     . '",' ;
    $outp .= '"precio":"'. $rs["precio"]     . '",' ;
    $outp .= '"visible":"'. $rs["visible"]     . '"}';

}
$outp ='{"datos":['.$outp.']}';

echo($outp);
?>
