<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuraciondb.php"); //conexion de base de datos
$consulta=mysqli_query($conexion, "SELECT DISTINCT tipoproducto FROM farmacia WHERE visible=1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
   <link rel="stylesheet" href="estilo.css">

</head>

<body>
<nav class="navbar navbar-inverse">

   <ul class="nav navbar-nav navbar-left">
      <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span>  Administrador </a>
  </ul>  

  <ul class="nav navbar-nav navbar-right">
      <li><a href="../index.php"><span class="glyphicon glyphicon-ban-circle"></span> Cerrar sesion</a></li>
  </ul>
</nav >
<br>
<br>


<div id="header">
      <ul class="nav">
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="../../administrador/agregar_usuario.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

        <li><a href="">Empleado</a>
          <ul>
            <li><a href="../../administrador/agregar_empleado.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Area</a>
          <ul>
            <li><a href="../../administrador/area_agregar.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Farmacia</a>
          <ul>
            <li><a href="../../administrador/agregar_producto.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Recursos Humanos</a>
          <ul>
            <li><a href="">Asignar Area</a>
              <ul>
                <li><a href="">Alta</a></li>
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>
              </ul></li>
            <li><a href="">Asignar sueldo</a>
              <ul>
                <li><a href="">Alta</a></li>
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>  
              </ul></li>
          </ul>
        </li>

           <li><a href="">Reportes</a>
          <ul>
            <li><a href="">Mostrar Nomina Total</a>
              <ul>
              <li><a href="">Por Area</a></li>
              <li><a href="">Por Sueldo</a></li>
              <li><a href="">Asistencia</a></li>  
              </ul></li>
            <li><a href="">Mostrar Todos Los Medicamentos</a>
              <ul>
               <li><a href="/Hospital/pdf/reportes/tipo.php" target="confirma" onSubmit="confirma = window.open('','Confirma Mensaje, 'width=300 height=200, status=no scrollbars=no, location=no, resizable=no, manu=no');">Por precio</a></li>
              <li><a href="">Port tipo</a></li> 
              </ul></li>
          </ul>
        </li>

      </ul>
    </div>


<div class='centrar'>    
<form action="tipo.php" target="confirma" onSubmit="confirma = window.open('','Confirma Mensaje, 'width=300 height=200, status=no scrollbars=no, location=no, resizable=no, manu=no');"  name="entrada_sistema" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label>Seleccione una opcion</label><br>
        
<select name="producto">
  <option value="TODAS">TODAS LAS OPCIONES</option>
  <?php
  while ($row=mysqli_fetch_array($consulta)) {
    echo "<option value='".$row['tipoproducto']."'>";
    echo $row['tipoproducto'];
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