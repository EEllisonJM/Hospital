<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");
$query = "SELECT rh.idEmpleado,e.nombre,p.sueldo,rh.idArea,rh.horaEntrada,rh.horaSalida,rh.bonificacion,rh.visible FROM RecursosHumanos as rh INNER JOIN Empleado as e INNER JOIN Puesto as p
WHERE rh.idEmpleado=e.idEmpleado and e.idPuesto=p.idPuesto;";
$result = mysqli_query($conexion, $query);
$outp   = "";
while ($rs = mysqli_fetch_array($result)) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"idEmpleado":"' . $rs["idEmpleado"] . '",';
    $outp .= '"nombre":"' . $rs["nombre"] . '",';
    $outp .= '"sueldo":"' . $rs["sueldo"] . '",';
    $outp .= '"idArea":"' . $rs["idArea"] . '",';
    $outp .= '"horaEntrada":"' . $rs["horaEntrada"] . '",';
	$outp .= '"horaSalida":"' . $rs["horaSalida"] . '",';
    $outp .= '"bonificacion":"' . $rs["bonificacion"] . '",';
    $outp .= '"visible":"' . $rs["visible"] . '"}';
}
$outp = '{"datos":[' . $outp . ']}';
echo ($outp);
?>
