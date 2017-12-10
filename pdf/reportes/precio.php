
<?php
require_once('../lib/pdf/mpdf.php');
include ("../../configuraciondb.php");
if($_REQUEST['todo'] == "Todos") {
$query = "SELECT * FROM Farmacia WHERE visible=1";
}else{
if($_REQUEST["menor"] < $_REQUEST["mayor"]){
$query = "SELECT * FROM Farmacia WHERE visible=1 AND precio BETWEEN '".$_REQUEST["menor"]."' AND '".$_REQUEST["mayor"]."'";
}else{
  $query = "SELECT * FROM Farmacia WHERE visible=1 AND precio BETWEEN '".$_REQUEST["mayor"]."' AND '".$_REQUEST["menor"]."'";
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
            <th class="service">ID DEL PRODUCTO</th>
            <th class="desc">NOMBRE</th>
            <th>TIPO</th>
            <th>EXISTENCIA</th>
            <th>PRECIO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($productos as $productos) {
        	$html.='         <tr>
            <td class="service">'.$productos['idProducto'].'</td>
            <td class="desc">'.$productos['nomProducto'].'</td>
            <td class="desc">'.$productos['tipoProducto'].'</td>
            <td class="unit">'.$productos['existencia'].'</td>
            <td class="qty">$'.$productos['precio'].'</td>
            <td class="total">$'.($productos['precio']*$productos['existencia']).'</td>
          </tr>';

          $total = $total + ($productos['precio']*$productos['existencia']);
        }

        $html .= '
 <tr>
            <td colspan="5">SUBTOTAL</td>
            <td class="total">$'.$total.'</td>
          </tr>
          <tr>
            <td colspan="5">SUBTOTAL</td>
            <td class="total">$'.$total.'</td>
          </tr>
          <tr>
            <td colspan="5">TAX 25%</td>
            <td class="total">$'.($total* 0.25).'</td>
          </tr>
          <tr>
            <td colspan="5" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$'.(($total* 0.25) + ($total)).'</td>
          </tr>
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