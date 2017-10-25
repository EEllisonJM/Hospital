<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios</title>
</head>

<body>

<center><label style="font-weight:bold; font-size: 14pt;">Listado de Usuarios</label></center>

<table border="2" align="center">
<tr>
        <td align="center" colspan="6">Datos</td>
</tr>

<tr>
        <td>ID de Usuario</td>
		<td align="center">Nombre de Usuario</td>
		<td align="center">Nombre</td>
		<td align="center">Tipo</td>
		<td align="center" colspan="2">Acción</td>
</tr>

<?php
         $consulta = mysqli_query($conexion,"SELECT idUsuario, idEmpleado, idPuesto, nombreUsuario, apellidoP, apellidoM, nombre, tipoempleado, visible
											FROM usuario NATURAL JOIN empleado NATURAL JOIN puesto
											WHERE visible = 1
											ORDER BY nombreUsuario");
		 //consulta donde muestra solamente los campos que esten activados por la bandera
		    while($registro = mysqli_fetch_array($consulta))
			{
				?>
				   <tr>
				         <td><?php echo $registro["idUsuario"]; ?></td>
						 <td><?php echo $registro["nombreUsuario"]; ?></td>
						 <td><?php echo $registro["apellidoP"], ' ', $registro["apellidoM"], ' ', $registro["nombre"]; ?></td>
						 <td><?php echo $registro["tipoempleado"], ' ', $registro["precio"]; ?></td>
						 <td><a href="editar_usuario.php?id=<?php echo $registro["idUsuario"];?>">Editar</a></td>
						 <!-- se hipervincula al archivo editar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
						 <td><a href="eliminar_usuario.php?id=<?php echo $registro["idUsuario"];?>">Eliminar</a></td>
						 <!-- se hipervincula al archivo eliminar mandando como parametros o valores heredados
                              el valor de id con variable "id" para su manipulacion	 -->
				   </tr>
				<?php
			}
?>
 

</table>

</body>
</html>