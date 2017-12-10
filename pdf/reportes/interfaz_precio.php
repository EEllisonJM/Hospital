<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../../configuraciondb.php"); //conexion de base de datos
include("menu.php");
$consulta=mysqli_query($conexion, "SELECT DISTINCT tipoProducto FROM farmacia WHERE visible=1");
?>
<html>
<head>

</head>

<body>

<div class='centrar'>    
<form action="precio.php" target="confirma" onSubmit="confirma = window.open('','Confirma Mensaje, 'width=300 height=200, status=no scrollbars=no, location=no, resizable=no, manu=no');"  name="entrada_sistema" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label>Seleccione un Opcion</label><br>

<label class="checkbox-inline"><input type="checkbox" name="todo" value="Todos">Todos los registros</label>
<br>
    <div> <label>Seleccione un rango</label><br>
    <input type="number" name="menor" min="1">  </div>   
  
  <div>   <label>Seleccione un rango</label><br>
    <input type="number" name="mayor" min="1"> </div>
 
      </div>

<input type="submit" name="ingresar" class="btn btn-primary glyphicon glyphicon-plus" value="Reporte">
            <a class="btn btn-danger" href="../../administrador/admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</form>
</div>

</body>
</html>