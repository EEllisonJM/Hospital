<?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuraciondb.php");

  if (strtolower($_REQUEST["act"]) == "actualizar")
  {
	 $act = "UPDATE area set nombre = '".$_REQUEST["nombre"]."',descripcion = '".$_REQUEST["descripcion"]."' WHERE id_area = ".$_REQUEST["id_2"]."";
	 //realiza la actualizacion en la tabla donde lo hace mediante la busqueda por "id"
	 
	 if(mysqli_query($conexion,$act))
     {   
      ?>
        <script language="javascript">
		alert("Actualizado Correctamente");
		window.location='mostrar_area.php';
		</script>
      <?php	// instruccion en JavaScript para mandar una ventana (alerta) con el mensaje que se requiera
            // asi mismo la instruccion window.location hace el redireccionamiento en este caso a la 
            // pagina principal, pero realmente puede ser a cualquier pagina que requieran.			
     }
     else
    {
      echo mysqli_error($conexion);
    }
  }

  if($_REQUEST["id"] != "")
  {
    $consulta = mysqli_query($conexion,"SELECT * FROM area WHERE id_area = ".$_REQUEST["id"]."");
	$mostrar = mysqli_fetch_array($consulta);
    
	if(mysqli_num_rows($consulta) >= 1) // checa que la consulta refleje registro(s)
    {
      $nombre = $mostrar["nombre"];
      $descripcion = $mostrar["descripcion"];	  
?>

<form name="editar" action="editar_area.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="id_2" value="<?php echo $_REQUEST["id"]; ?>">
  <!-- instruccion donde se lee un input escondido donde contiene el valor del "id" para hacer el update -->

<table width="341" align="center" class="tabla">
  <tr>
	  <td colspan="2" align="center"><h3>DATOS</h3></td>
  </tr>

  <tr>
	  <td align="center">Nombre</td>
	  <td><input type="text" name="nombre" value="<?php echo $nombre ?>" /></td>
	  <!-- muestra el registro proyectado por la consulta -->
  </tr>

  <tr>
	  <td align="center">Descripcion</td>
	  <td><input type="text" name="descripcion" value="<?php echo $descripcion ?>" /></td>
  </tr>

  <tr>
	  <td colspan="2" align="center"><input type="submit" name="act" value="Actualizar"></td>
  </tr>

</table>
</form>
<?php
    }
  }
?>
</div>
</div>