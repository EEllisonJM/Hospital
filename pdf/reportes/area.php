<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
require_once('../lib/pdf/mpdf.php');
include("../../configuraciondb.php");
if ($_REQUEST['producto'] == "TODAS") {
    $query = "SELECT rh.idEmpleado,e.nombre,e.apellidoP,e.apellidoM,p.sueldo,rh.idArea,a.nombre as nombreArea,rh.horaEntrada,rh.horaSalida,rh.bonificacion,rh.visible FROM RecursosHumanos as rh INNER JOIN Empleado as e INNER JOIN Puesto as p INNER JOIN Area as a
WHERE rh.idEmpleado=e.idEmpleado and e.idPuesto=p.idPuesto and a.idArea=rh.idArea and rh.visible=1";
} else {
    $query = "SELECT rh.idEmpleado,e.nombre,e.apellidoP,e.apellidoM,p.sueldo,rh.idArea,a.nombre as nombreArea,rh.horaEntrada,rh.horaSalida,rh.bonificacion,rh.visible FROM RecursosHumanos as rh INNER JOIN Empleado as e INNER JOIN Puesto as p INNER JOIN Area as a
WHERE rh.idEmpleado=e.idEmpleado and e.idPuesto=p.idPuesto and a.idArea=rh.idArea and rh.visible=1 rh.idArea='" . $_REQUEST["producto"] . "'";
}
$prepare = $conexion->prepare($query);
$prepare->execute();
$resultSet = $prepare->get_result();
while ($productos[] = $resultSet->fetch_array()) {
    # code...
}

$fecha = date("d/m/Y");

$html = ' 
  <head>
    <meta charset="utf-8">
    <title>REPORTE </title>
    <link rel="stylesheet" href="css/style.css" media="all" />
  </head>
  <header class="clearfix">
      <div id="logo">
        <img src="img/salud.png">
      </div>
      <h1>HOSPITAL GENERAL</h1>

      <div id="project">
        <div><span>REPORTE</span>  RECURSOS HUMANOS</div>
      
        <div><span>DIRECCION</span> Avenida Principal 123</div>
        <div><span>EMAIL</span>  nombre.apellido@ejemplo.com</a></div>
        <div><span>FECHA</span> ' . $fecha . '</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ID EMPLEADO </th>
            <th class="desc">AREA</th>
            <th>NOMBRE AREA</th>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>SUELDO</th>
            <th>HORA ENTRADA</th>
            <th>HORA SALIDA</th>
            <th>BONIFICACION</th>
          </tr>
        </thead>
        <tbody>';

foreach ($productos as $productos) {
    $html .= '         <tr>
            <td class="service">' . $productos['idEmpleado'] . '</td>
            <td class="desc">' . $productos['idArea'] . '</td>
            <td class="desc">' . $productos['nombreArea'] . '</td>
            <td class="desc">' . $productos['nombre'] . '</td>
            <td class="desc">' . $productos['apellidoP'] . '</td>
            <td class="desc">' . $productos['apellidoM'] . '</td>
            <td class="desc">' . $productos['sueldo'] . '</td>
            <td class="desc">' . $productos['horaEntrada'] . '</td>
            <td class="unit">' . $productos['horaSalida'] . '</td>
            <td class="qty">' . $productos['bonificacion'] . '</td>
          </tr>';
}

$html .= '
 <tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">REPORTE DE EMPLEADOS GRACIAS POR SU PREFERENCIA</div>
      </div>
    </main>';
$mpdf = new mPDF('c', 'A4');
$mpdf->writeHTML($html);
$mpdf->Output('productos.pdf', 'I');
?>