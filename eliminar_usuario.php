<?php
error_reporting(E_ALL ^ E_NOTICE);
include("configuracion.php");
	 $act = "UPDATE Usuario set visible = 0 WHERE idUsuario = ".$_REQUEST["id"]."";
	 if(mysqli_query($conexion,$act))
     {
      ?>
        <script language="javascript">
		alert("Usuario Eliminado Correctamente");
		window.location='mostrar_usuario.php';
		</script>
      <?php			
     }
     else
    {
      echo mysqli_error($conexion);
    }
?> 