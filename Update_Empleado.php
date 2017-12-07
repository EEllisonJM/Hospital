<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=utf-8,Content-Type: application/html;charset=utf-8");
require("configuraciondb.php");


// pasa el contenido de mostrar_area
$data = json_decode(file_get_contents('php://input'));
//asigna los datos del array
$idEmpleado = mysqli_real_escape_string($conexion, $data->idEmpleado);
$idpuesto = mysqli_real_escape_string($conexion, $data->idpuesto);
$nombre = mysqli_real_escape_string($conexion, $data->nombre);
$apellidoP = mysqli_real_escape_string($conexion, $data->apellidoP);
$apellidoM = mysqli_real_escape_string($conexion, $data->apellidoM);
$sexo = mysqli_real_escape_string($conexion, $data->sexo);
$fecha_nacimiento = mysqli_real_escape_string($conexion, $data->$sexo);
$telefono = mysqli_real_escape_string($conexion, $data->telefono);
$calle = mysqli_real_escape_string($conexion, $data->calle);
$colonia = mysqli_real_escape_string($conexion, $data->colonia);
$codigo_postal = mysqli_real_escape_string($conexion, $data->codigo_postal);
$ciudad = mysqli_real_escape_string($conexion, $data->ciudad);
$e_mail = mysqli_real_escape_string($conexion, $data->e_mail);
$visible = mysqli_real_escape_string($conexion, $data->visible);
// mysqli query para actualizar datos
$query = "UPDATE Empleado SET idEmpleado='$idEmpleado',idpuesto='$idpuesto',nombre='$nombre',apellidoP='$apellidoP',apellidoM='$apellidoM',
sexo='$sexo',telefono='$telefono',calle='$calle',colonia='$colonia',codigo_postal='$codigo_postal',ciudad='$ciudad',e_mail='$e_mail',
visible='$visible' WHERE idEmpleado=$idEmpleado";
mysqli_query($conexion, $query);
echo "Actualizacion correcta";
?>
