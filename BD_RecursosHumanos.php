<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");
$query = "SELECT * FROM RecursosHumanos";
$result = mysqli_query($conexion, $query);
$outp   = "";
while ($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"idEmpleado":"' . $rs["idEmpleado"] . '",';
    $outp .= '"idArea":"' . $rs["idArea"] . '",';
    $outp .= '"horaEntrada":"' . $rs["horaEntrada"] . '",';
	$outp .= '"horaSalida":"' . $rs["horaSalida"] . '",';
    $outp .= '"bonificacion":"' . $rs["bonificacion"] . '",';
    $outp .= '"visible":"' . $rs["visible"] . '"}';
}
$outp = '{"datos":[' . $outp . ']}';
echo ($outp);
?>
