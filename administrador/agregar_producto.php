<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
include("menu.php");

if($_SESSION["tipo"]=="ADMINISTRADOR"||$_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS")
{
  if($_REQUEST['registrar'] == "Registrar") 
  //$_REQUEST registrar invoca al name del boton y lo compara con el value del input del boton
{

  $resultado = mysqli_query($conexion,"INSERT INTO Farmacia (nomproducto, tipoproducto, existencia, precio, visible) 
  VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["tipo"]."', '".$_REQUEST["existencia"]."', '".$_REQUEST["precio"]."', '1')");

?>
       <script>
                  alert("Producto Agregado con exito");
       </script>
    <?php   
}

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
   <link rel="stylesheet" href="estilo.css">
   
</head>
<body>


 
<div class='centrar'>
  
    <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left" align="center"> 
      <!--Formulario-->    
      <div class="col-sm-6">
      <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" name="registro" method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <label>Nombre del producto</label><br>
        <input type="text" class="col-md-8" name="nombre" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
      </div>

     <div class="form-group">
        <label>Tipo del producto</label><br>
        
      <select name="tipo">
            <option value="ANALGESICOS">ANALGESICOS</option>
            <option value="ANTIACIDOS Y ANTIULCEROSOS">ANTIACIDOS Y ANTIULCEROSOS</option>
            <option value="ANTIALERGICOS">ANTIALERGICOS</option>
            <option value="ANTIDIARREICOS Y LAXANTES">ANTIDIARREICOS Y LAXANTES</option>
            <option value="ANTIINFECCIOSOSE">ANTIINFECCIOSOSE</option>
            <option value="ANTIINFLAMATORIOS">ANTIINFLAMATORIOS</option>
            <option value="ANTIPIRETICOS">ANTIPIRETICOS</option>
            <option value="ANTITUSIVOS Y MUCOLITICOS">ANTITUSIVOS Y MUCOLITICOS</option>
        </select>
      </div>

     <div class="form-group">
        <label>Cantidad</label><br>
    <input type="number" class="col-md-8"  name="existencia" min="0" max="50000" required>
      </div>

      <div class="form-group">
        <label>Precio</label><br>
    <input type="number" class="col-md-8"  name="precio" min="0" max="10000" required>
      </div>



      <div class="form-group col-md-6">
            <input type="submit" name="registrar" class="btn btn-primary glyphicon glyphicon-plus" value="Registrar">
            <a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
      </div>
    </form>
  </div>
    <!--Formulario-->
    </div>
    </div>

  </div>

</div>


  <p> 
      
  </p>
</body>

</html>


<?php 

}
// cuando no este logueado (iniciado sesion) mostrara la siguiente alerta de acceso denegado y redireccionara al login de inicio de sesion
else
  {
?>
    <script>
        alert("Acceso Denegado");
        window.location = "../ses/logueo.php";
    </script>
<?php
  }
?>