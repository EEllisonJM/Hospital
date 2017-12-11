<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");
$query = "SELECT RH.idEmpleado, idArea, horaEntrada, horaSalida, bonificacion, apellidoP, apellidoM, nombre, RH.visible FROM RecursosHumanos as RH INNER JOIN Empleado as E WHERE E.idEmpleado = RH.idEmpleado";
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
	$outp .= '"apellidoP":"' . $rs["apellidoP"] . '",';
	$outp .= '"apellidoM":"' . $rs["apellidoM"] . '",';
	$outp .= '"nombre":"' . $rs["nombre"] . '",';
    $outp .= '"visible":"' . $rs["visible"] . '"}';
}
$outp = '{"datos":[' . $outp . ']}';
echo ($outp);
?>
