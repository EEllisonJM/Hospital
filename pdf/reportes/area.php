<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
require_once('../lib/pdf/mpdf.php');
include("../../configuraciondb.php");
if ($_REQUEST['producto'] == "TODAS") {
    $query = "SELECT * FROM RecursosHumanos WHERE visible=1";
} else {
    $query = "SELECT * FROM RecursosHumanos WHERE visible=1 AND idArea='" . $_REQUEST["producto"] . "'";
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