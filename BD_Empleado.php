<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require("configuraciondb.php");

$result = mysqli_query($conexion,"SELECT * FROM Empleado");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
    if($outp != "")
    {
    	$outp .= ",";
    }
    $outp .= '{"idEmpleado":"'  . $rs["idEmpleado"] . '",';
    $outp .= '"idPuesto":"'   . $rs["idPuesto"]        . '",';
    $outp .= '"apellidoP":"'. $rs["apellidoP"]     . '",' ;
    $outp .= '"apellidoM":"'. $rs["apellidoM"]     . '",' ;
    $outp .= '"nombre":"'. $rs["nombre"]     . '",' ;
    $outp .= '"sexo":"'. $rs["sexo"]     . '",' ;
    $outp .= '"fecha_nacimiento":"'. $rs["fecha_nacimiento"]     . '",' ;
    $outp .= '"telefono":"'. $rs["telefono"]     . '",' ;
    $outp .= '"calle":"'. $rs["calle"]     . '",' ;
    $outp .= '"colonia":"'. $rs["colonia"]     . '",' ;
    $outp .= '"codigo_postal":"'. $rs["codigo_postal"]     . '",' ;
    $outp .= '"ciudad":"'. $rs["ciudad"]     . '",' ;
    $outp .= '"e_mail":"'. $rs["e_mail"]     . '",' ;
    $outp .= '"visible":"'. $rs["visible"]     . '"}';

}
$outp ='{"datos":['.$outp.']}';

echo($outp);
?>
