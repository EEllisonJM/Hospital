<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");
$query = "SELECT * FROM Farmacia";
$result = mysqli_query($conexion, $query);
$outp   = "";
while ($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"nombre":"' . $rs["nombre"] . '",';
    $outp .= '"tipoProducto":"' . $rs["tipoProducto"] . '",';
    $outp .= '"existencia":"' . $rs["existencia"] . '",';
    $outp .= '"precio":"' . $rs["precio"] . '",';
    $outp .= '"visible":"' . $rs["visible"] . '",';
    $outp .= '"id":"' . $rs["idProducto"] . '"}';
}
$outp = '{"datos":[' . $outp . ']}';
echo ($outp);
?>
