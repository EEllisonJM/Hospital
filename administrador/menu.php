<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
<link rel="stylesheet" href="/PW/Hospital/administrador/estilo_admin.css">
</head>


<body>

<nav class="navbar navbar-inverse">

   <ul class="nav navbar-nav navbar-left">
      <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span><?php echo ' '.$_SESSION["tipo"],': '.$_SESSION["usuario"]; ?></a>
  </ul>  

  <ul class="nav navbar-nav navbar-right">
      <li><a href="/PW/Hospital/ses/logout.php"><span class="glyphicon glyphicon-ban-circle"></span> Cerrar sesion</a></li>
  </ul>
</nav >

<div id="header">
      <ul class="nav">
		<?php if($_SESSION["tipo"]=="ADMINISTRADOR"){ ?>
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="/PW/Hospital/administrador/agregar_usuario.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php
		}
		
		if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Empleado</a>
          <ul>
            <li><a href="/PW/Hospital/administrador/agregar_empleado.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
         <li><a href="">Area</a>
          <ul>
            <li><a href="/PW/Hospital/administrador/area_agregar.php">Alta</a></li>
            <li><a href="/PW/Hospital/administrador/mostrar_area.php">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
         <li><a href="">Farmacia</a>
          <ul>
            <li><a href="/PW/Hospital/administrador/agregar_producto.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
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
                <li><a href="/PW//Hospital/pdf/reportes/interfaz_precio.php">Por precio</a></li>
              <li><a href="/PW/Hospital/pdf/reportes/interfaz_tipo.php">Por tipo</a></li> 
              </ul></li>
          </ul>
        </li>
		<?php } ?>
      </ul>
    </div>

</body>

</html>