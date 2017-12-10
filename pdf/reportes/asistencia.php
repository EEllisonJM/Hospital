<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
require_once('../lib/pdf/mpdf.php');
include ("../../configuraciondb.php");
if($_REQUEST['perfecta'] == "perfecta") {
$query = "SELECT RecursosHumanos.idEmpleado, RecursosHumanos.idArea, Asistencia.fecha, Asistencia.horaEntra, Asistencia.horaSale FROM RecursosHumanos INNER JOIN Asistencia ON RecursosHumanos.idEmpleado=Asistencia.idEmpleado AND Asistencia.horaEntra <= RecursosHumanos.horaEntrada";
}else{
if($_REQUEST['inperfecta'] == "inperfecta"){
$query = "SELECT RecursosHumanos.idEmpleado, RecursosHumanos.idArea, Asistencia.fecha, Asistencia.horaEntra, Asistencia.horaSale FROM RecursosHumanos INNER JOIN Asistencia ON RecursosHumanos.idEmpleado=Asistencia.idEmpleado AND Asistencia.horaEntra >= RecursosHumanos.horaEntrada";
}
}
$prepare = $conexion->prepare($query);
$prepare->execute();
$resultSet = $prepare->get_result();
while ($productos[]= $resultSet->fetch_array()) {
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
        <div><span>REPORTE</span>  MEDICAMENTOS</div>
       
        <div><span>DIRECCION</span> Avenida Principal 123</div>
        <div><span>EMAIL</span>  nombre.apellido@ejemplo.com</a></div>
        <div><span>FECHA</span> '.$fecha.'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ID DEL EMPLEADO</th>
            <th class="desc">ID AREA</th>
            <th>FECHA</th>
            <th>HORA ENTRADA</th>
            <th>HORA SALIDA</th>
            
          </tr>
        </thead>
        <tbody>';

        foreach ($productos as $productos) {
        	$html.='         <tr>
            <td class="service">'.$productos['idEmpleado'].'</td>
            <td class="desc">'.$productos['idArea'].'</td>
            <td class="desc">'.$productos['fecha'].'</td>
            <td class="unit">'.$productos['horaEntra'].'</td>
            <td class="qty">'.$productos['horaSale'].'</td>
          </tr>';

          
        }

        $html .= '
 <tr>
            
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">REPORTE DE MEDICAMENTOS EN EXISTENCIA EN EL AREA DE FARMACIAS GRACIAS POR SU PREFERENCIA</div>
      </div>
    </main>';
$mpdf = new mPDF('c', 'A4');
$mpdf->writeHTML($html);
$mpdf->Output('productos.pdf', 'I')
?>