<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Areas</title>
</head>

<body>

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
						 <td><a href="editar.php?id=<?php echo $registro["id_area"];?>">Editar</a></td>
						 <!-- se hipervincula al archivo editar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
						 <td><a href="eliminar.php?id=<?php echo $registro["id_area"];?>">Eliminar</a></td>
						 <!-- se hipervincula al archivo eliminar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
				   </tr>
				<?php
			}
?>
 

</table>

</body>
</html>