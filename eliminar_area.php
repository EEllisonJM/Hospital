<?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuracion.php");

     //$act = "DELETE FROM area WHERE id = ".$_REQUEST["id"]."";
	 // elimine completamente el registro
	 
	 $act = "UPDATE Area set visible = 0 WHERE id_area = ".$_REQUEST["id"]."";
	 // se hace la baja mediante desactivacion, en este caso que la bandera sea 0
	 // en mi caso puede ser 1 = activado y 0 = desactivado, puede ser igual
	 // activado como texto y desactivo como texto, true, false, etc
	 // a su criterio.
	 
	 if(mysqli_query($conexion,$act))
     {
      ?>
        <script language="javascript">
		alert("Eliminado Correctamente");
		window.location='../hospital/mostrar_area.php';
		</script>
      <?php			
     }
     else
    {
      echo mysqli_error($conexion);
    }
?> 