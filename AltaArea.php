<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos

if($_REQUEST['registrar'] == "Registrar") 
	//$_REQUEST registrar invoca al name del boton y lo compara con el value del input del boton
{
	if($_REQUEST["nombre"] == "" or $_REQUEST["descripcion"] == "")
	// aqui hacemos la validacion de que no existan campos vacios, sean ambos o alguno de los 2 en este ejemplo.
	{         //aqui ventana de alerta en JavaScript mostrando el detalle en cuestion.
		?>
		   <script>
		              alert("Rellena los campos, por favor.");
		   </script>
		<?php   
	}
	else
		
  $resultado = mysqli_query($conexion,"INSERT INTO area (nombre, descripcion) 
  VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["descripcion"]."')");
  //realiza el query,en este caso la insercion a la tabla de la base de datos en cuestion
  /* 
     El archivo conexion:
	 
	 La variable $conexion es invocada desde la variable con el mismo nombre en el archivo configuracion.php
	 
	 de esta linea de codigo: $conexion=mysqli_connect("$host", "$usuario", "$password","$nombre_de_base");
	 
	 si se cambia esa variable a $cnx o cualquier otro nombre en el archivo de configuracion.php, aqui en esa
	 instruccion se debe de cambiar igual.
  
     EN VALUES: 
	 
     es importante comentar que para valores de tipo texto su sintaxis tiene que ser asi:
          '".$_REQUEST["uno"]."'
		  '".$_REQUEST["dos"]."'
		  con comilla simple de inicio y enseguida comilla doble y lo mismo al terminar
     
	 para valores numericos seria simplemente sin la comilla simple:
	      ".$_REQUEST["uno"]."
		  ".$_REQUEST["dos"]."	

     es decir para el ejemplo si campo dos fuera numerico en la base de datos la instruccion seria asi:
 
     $resultado = mysqli_query($conexion,"INSERT INTO insertar (uno, dos) VALUES ('".$_REQUEST["uno"]."',".$_REQUEST["dos"].")");
	 
  */
}
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Area</title>
</head>


<body>
	    <!-- Creacion de un argen para el formulario -->
    <table border="0" align="center" valign="middle">
    <tr>
    <td rowspan=2>
    <table border="0">


<center>

<form action="<?=$_SERVER['PHP_SELF'];?>" name="registro" method="post" enctype="multipart/form-data">
  <fieldset> 
<legend  style="font-size: 20pt"><b>Registro Area</b></legend>


 <div class="item_requerid">Nombre</div>
  <div class="form_requerid">
  	<input type="text" name="nombre" pattern="[A-Za-z ]+" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="60"></div>

  <div class="item_requerid">Descripcion</div>
    <div class="form_requerid">
  <div class="form_requerid"><input type="text" name="descripcion" pattern="[A-Za-z ]+" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="80"></div>


<input type="submit" name="registrar" value="Registrar">
  </fieldset>
</form>
</center>
</body>
</html>