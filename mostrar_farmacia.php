<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Farmacia</title>
</head>

<body>

<center><label style="font-weight:bold; font-size: 14pt;">Farmacia</label></center>

<table border="2" align="center">
<tr>
        <td align="center" colspan="6">Listado de productos</td>
</tr>

<tr>
        <td>Nombre</td>
		<td>Tipo</td>
		<td>Existencia</td>
		<td>Precio</td>
		<td align="center" colspan="2">Accion</td>
</tr>

<?php
         $consulta = mysqli_query($conexion,"SELECT * FROM farmacia WHERE visible = 1");
		 //consulta donde muestra solamente los campos que esten activados por la bandera
		    while($registro = mysqli_fetch_array($consulta))
			{
				?>
				   <tr>
				         <td><?php echo $registro["nomproducto"]; ?></td>
						 <td><?php echo $registro["tipoproducto"]; ?></td>
						 <td><?php echo $registro["existencia"]; ?></td>
						 <td><?php echo $registro["precio"]; ?></td>
						 <td><a href="editar.php?id=<?php echo $registro["idproducto"];?>">Editar</a></td>
						 <!-- se hipervincula al archivo editar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
						 <td><a href="eliminar.php?id=<?php echo $registro["idproducto"];?>">Eliminar</a></td>
						 <!-- se hipervincula al archivo eliminar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
				   </tr>
				<?php
			}
?>
 

</table>

</body>
</html>