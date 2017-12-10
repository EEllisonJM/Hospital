<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../../configuraciondb.php"); //conexion de base de datos
include("menu.php");
$consulta=mysqli_query($conexion, "SELECT * FROM Area WHERE visible=1");
?>
<html>
<head>
</head>

<body>

<div class='centrar'>    
<form action="area.php" target="confirma" onSubmit="confirma = window.open('','Confirma Mensaje, 'width=300 height=200, status=no scrollbars=no, location=no, resizable=no, manu=no');"  name="entrada_sistema" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label>Seleccione una opcion</label><br>
        
<select name="producto">
  <option value="TODAS">TODAS LAS OPCIONES</option>
  <?php
  while ($row=mysqli_fetch_array($consulta)) {
    echo "<option value='".$row['idArea']."'>";
    echo $row['nombre'];
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