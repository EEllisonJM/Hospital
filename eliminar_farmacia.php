<?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuracion.php");
	 $act = "UPDATE Farmacia set visible = 0 WHERE idproducto = ".$_REQUEST["id"]."";
	 if(mysqli_query($conexion,$act))
     {
      ?>
        <script language="javascript">
		alert("Producto Eliminado Correctamente");
		window.location='mostrar_farmacia.php';
		</script>
      <?php			
     }
     else
    {
      echo mysqli_error($conexion);
    }
?> 