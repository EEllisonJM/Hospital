<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuraciondb.php"); //conexion de base de datos 
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
  </style>
</head>

<body>

	<nav class="navbar navbar-inverse">
	<div class="navbar-header">
      <a class="navbar-brand">Hospital</a>

    </div>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> cerrar sesion</a></li>
  </ul> 
</nav>


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