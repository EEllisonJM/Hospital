<?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuracion.php");
	
	 $act = "UPDATE Puesto set visible = 0 WHERE idpuesto = ".$_REQUEST["id"]."";
	 // se hace la baja mediante desactivacion, en este caso que la bandera sea 0
	 // en mi caso puede ser 1 = activado y 0 = desactivado, puede ser igual
	 // activado como texto y desactivo como texto, true, false, etc
	 // a su criterio.
	 
	 if(mysqli_query($conexion,$act))
     {
      ?>
        <script language="javascript">
		alert("Puesto Eliminado");
		window.location='mostrar_puesto.php';
		</script>
      <?php			
     }
     else
    {
      echo mysqli_error($conexion);
    }
?> 