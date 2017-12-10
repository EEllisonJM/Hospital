
<?php
require_once('../lib/pdf/mpdf.php');
include ("../../configuraciondb.php");
if($_REQUEST['todo'] == "Todos") {
$query = "SELECT Empleado.idEmpleado, Empleado.nombre, Empleado.apellidoM, Puesto.sueldo FROM Empleado INNER JOIN Puesto ON Empleado.idPuesto=Puesto.idPuesto AND  Empleado.visible=1";
}else{
if($_REQUEST["menor"] < $_REQUEST["mayor"]){
$query = "SELECT Empleado.idEmpleado, Empleado.nombre, Empleado.apellidoM, Puesto.sueldo FROM Empleado INNER JOIN Puesto ON Empleado.idPuesto=Puesto.idPuesto AND Puesto.sueldo BETWEEN '".$_REQUEST["menor"]."' AND '".$_REQUEST["mayor"]."'";
}else{
  $query = "SELECT Empleado.idEmpleado, Empleado.nombre, Empleado.apellidoM, Puesto.sueldo FROM Empleado INNER JOIN Puesto ON Empleado.idPuesto=Puesto.idPuesto AND Puesto.sueldo BETWEEN '".$_REQUEST["mayor"]."' AND '".$_REQUEST["menor"]."'";
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
            <th class="desc">NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>SUELDO</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($productos as $productos) {
        	$html.='         <tr>
            <td class="service">'.$productos['idEmpleado'].'</td>
            <td class="desc">'.$productos['nombre'].'</td>
            <td class="desc">'.$productos['apellidoM'].'</td>
            <td class="unit">'.$productos['sueldo'].'</td>
          </tr>';

          $total = $total + ($productos['precio']*$productos['existencia']);
        }

        $html .= '
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