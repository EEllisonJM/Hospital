<?php
require_once('../lib/pdf/mpdf.php');
include ("../../configuraciondb.php");
if($_REQUEST['perfecta'] == "perfecta") {
$query = "SELECT RecursosHumanos.idEmpleado, Empleado.nombre, Empleado.apellidoP, Empleado.apellidoM, Area.nombre as nom, Asistencia.fecha, Asistencia.horaEntra, Asistencia.horaSale 
FROM Empleado 
INNER JOIN RecursosHumanos ON Empleado.idEmpleado = RecursosHumanos.idEmpleado 
INNER JOIN Asistencia ON Asistencia.idEmpleado=RecursosHumanos.idEmpleado 
INNER JOIN Area ON Area.idArea=RecursosHumanos.idArea
AND Asistencia.horaEntra <= RecursosHumanos.horaEntrada";
}else{
if($_REQUEST['inperfecta'] == "inperfecta"){
$query = "SELECT RecursosHumanos.idEmpleado, Empleado.nombre, Empleado.apellidoP, Empleado.apellidoM, Area.nombre as nom, Asistencia.fecha, Asistencia.horaEntra, Asistencia.horaSale 
FROM Empleado 
INNER JOIN RecursosHumanos ON Empleado.idEmpleado = RecursosHumanos.idEmpleado 
INNER JOIN Asistencia ON Asistencia.idEmpleado=RecursosHumanos.idEmpleado 
INNER JOIN Area ON Area.idArea=RecursosHumanos.idArea
AND Asistencia.horaEntra > RecursosHumanos.horaEntrada";
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
        <div><span>REPORTE</span>  ASISTENCIA </div>
       
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
            <th class="desc">NOMBRE</th>
            <th class="desc">APELLIDO P.</th>
            <th class="desc">APELLIDO M.</th>
            <th class="desc">NOMBRE DEL AREA</th>
            <th>FECHA</th>
            <th>HORA ENTRADA</th>
            <th>HORA SALIDA</th>
            
          </tr>
        </thead>
        <tbody>';

        foreach ($productos as $productos) {
        	$html.='         <tr>
            <td class="service">'.$productos['idEmpleado'].'</td>
            <td class="desc">'.$productos['nombre'].'</td>
            <td class="desc">'.$productos['apellidoP'].'</td>
            <td class="desc">'.$productos['apellidoM'].'</td>
            <td class="desc">'.$productos['nom'].'</td>
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
        <div class="notice">REPORTE  GRACIAS POR SU PREFERENCIA</div>
      </div>
    </main>';
$mpdf = new mPDF('c', 'A4');
$mpdf->writeHTML($html);
$mpdf->Output('productos.pdf', 'I')
?>