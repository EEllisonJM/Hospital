<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../../configuraciondb.php"); //conexion de base de datos
include("menu.php");
$consulta=mysqli_query($conexion, "SELECT DISTINCT tipoProducto FROM Farmacia WHERE visible=1");

if ($_SESSION["tipo"] == "ADMINISTRADOR" || $_SESSION["tipo"] == "GERENTE" || $_SESSION["tipo"] == "JEFE DE AREA" || $_SESSION["tipo"] == "ENCARGADO DE FARMACIA" || $_SESSION["tipo"] == "JEFE DE RECURSOS HUMANOS") {
?>

<html>
<head>
</head>

<body>

<div class='centrar'>    
<form action="tipo.php" target="confirma" onSubmit="confirma = window.open('','Confirma Mensaje, 'width=300 height=200, status=no scrollbars=no, location=no, resizable=no, manu=no');"  name="entrada_sistema" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label>Seleccione una opcion</label><br>
        
<select name="producto">
  <option value="TODAS">TODAS LAS OPCIONES</option>
  <?php
  while ($row=mysqli_fetch_array($consulta)) {
    echo "<option value='".$row['tipoProducto']."'>";
    echo $row['tipoProducto'];
    echo "</option>";
  }
  ?>
</select>
      </div>

<input type="submit" name="ingresar" class="btn btn-primary glyphicon glyphicon-plus" value="Reporte">
            <a class="btn btn-danger" href="../../administrador/admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</form>
</div>

</body>
</html>

<?php

}
// cuando no este logueado (iniciado sesion) mostrara la siguiente alerta de acceso denegado y redireccionara al login de inicio de sesion
else {
?>
  <script>
       window.location = "../../administrador/admin.php";
   </script>
<?php
}
?>