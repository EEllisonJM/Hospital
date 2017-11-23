<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
  <style type="text/css">
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
        hr {
            border:3px solid #000;
            border-color: #A7DBD8;
        }
        #imagentop {
          background-position: center;
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
  .centrar
  {

    margin-left: 200px;
    margin-top: 132px;
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
<br>

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
               <li><a href="">Por precio</a></li>
              <li><a href="">Port tipo</a></li> 
              </ul></li>
          </ul>
        </li>
		<?php } ?>

      </ul>
    </div>


<div class="centrar">
 <center><label style="font-weight:bold; font-size: 14pt;">Listado de areas</label></center>

<table border="2" align="center">
<tr>
        <td align="center" colspan="4">Datos</td>
</tr>

<tr>
        <td>Nombre</td>
    <td>Descripcion</td>
    <td align="center" colspan="2">Accion</td>
</tr> 

</div>


<?php
         $consulta = mysqli_query($conexion,"SELECT * FROM area WHERE visible = 1");
		 //consulta donde muestra solamente los campos que esten activados por la bandera
		    while($registro = mysqli_fetch_array($consulta))
			{
				?>
				   <tr>
				         <td><?php echo $registro["nombre"]; ?></td>
						 <td><?php echo $registro["descripcion"]; ?></td>
						 <td><a href="editar_area.php?id=<?php echo $registro["id_area"];?>">Editar</a></td>
						 <!-- se hipervincula al archivo editar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
						 <td><a href="eliminar_area.php?id=<?php echo $registro["id_area"];?>">Eliminar</a></td>
						 <!-- se hipervincula al archivo eliminar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
				   </tr>
				<?php
			}
?>
 

</table>
<center><a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a> 
</center>

</body>
</html>