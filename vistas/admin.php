<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos

if($_SESSION["tipo"]=="ADMINISTRADOR"||$_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS")
{
	
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
<style type="text/css">
        hr  {
            border:11px solid #000;
            border-color: #A7DBD8;
        }
        h1 {
          color: #5bc0de;
          font-family: Times;
        }
* {
        margin:0px;
        padding:0px;
      }

      #header {
        margin:auto;
        width:1100px;
        font-family:Arial, Helvetica, sans-serif;
      }
      
      ul, ol {
        list-style:none;
      }
      
      .nav > li {
        float:left;

      }
      
      .nav li a {
        background-color:#000;
        color:#fff;
        text-decoration:none;
        padding:12px 40px;
        display:block;
      }
      
      .nav li a:hover {
        background-color:#434343;
      }
      
      .nav li ul {
        display:none;
        position:absolute;
        min-width:150px;
      }
      
      .nav li:hover > ul {
        display:block;
      }
      
      .nav li ul li {
        position:relative;
      }
      
      .nav li ul li ul {
        right:-150px;
        top:0px;
      }

</style>
</head>


<body>

<nav class="navbar navbar-inverse">

   <ul class="nav navbar-nav navbar-left">
      <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span><?php echo ' '.$_SESSION["tipo"],': '.$_SESSION["usuario"]; ?></a>
  </ul>  

  <ul class="nav navbar-nav navbar-right">
      <li><a href="../index.php"><span class="glyphicon glyphicon-ban-circle"></span> Cerrar sesion</a></li>
  </ul>
</nav >

<div id="header">
	<ul class="nav">
		
		<?php if($_SESSION["tipo"]=="ADMINISTRADOR"){ ?>
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php
		}
		
		if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Empleado</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Area</a>
          <ul>
            <li><a href="area_agregar.php">Alta</a></li>
            <li><a href="mostrar_area.php">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Farmacia</a>
          <ul>
            <li><a href="">Alta</a></li>
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
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>
              </ul></li>
            <li><a href="">Asignar sueldo</a>
              <ul>
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
               <li><a target="_blank" href="../pdf/reportes/precio.php">Por precio</a></li>
              <li><a href="">Port tipo</a></li> 
              </ul></li>
          </ul>
        </li>
		<?php } ?>

      </ul>
    </div>

</body>

</html>

<?php 

}
// cuando no este logueado (iniciado sesion) mostrara la siguiente alerta de acceso denegado y redireccionara al login de inicio de sesion
else
	{
?>
		<script>
				alert("Acceso Denegado");
				window.location = "../ses/logueo.php";
		</script>
<?php
	}
?>