<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
$consulta=mysqli_query($conexion, "SELECT * FROM empleado WHERE visible=1");
if($_SESSION["tipo"]=="ADMINISTRADOR"||$_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS")
{
  if($_REQUEST['registrar'] == "Registrar") 
  //$_REQUEST registrar invoca al name del boton y lo compara con el value del input del boton
{
  if($_REQUEST["nombre"] == "" or $_REQUEST["pass"] == "")
  // aqui hacemos la validacion de que no existan campos vacios, sean ambos o alguno de los 2 en este ejemplo.
  {         //aqui ventana de alerta en JavaScript mostrando el detalle en cuestion.
    ?>
       <script>
                  alert("Rellena los campos, por favor.");
       </script>
    <?php   
  }
  else
    
  $idp=$_POST['empleado'];
  $checkid=mysqli_query($conexion,"SELECT * FROM usuario WHERE idEmpleado='$idp'");
  $check_nom=mysqli_num_rows($checkid);

if($check_nom>0){
        echo ' <script language="javascript">alert("Atencion, ya existe un usuario con este ID");</script> ';
      }else{

  $resultado = mysqli_query($conexion,"INSERT INTO usuario (userName, password, visible, idEmpleado) 
  VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["pass"]."', '1','".$_REQUEST["empleado"]."')");

?>
       <script>
                  alert("Usuario Agregado con exito");
       </script>
    <?php   

}
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

<nav class="navbar navbar-inverse">

   <ul class="nav navbar-nav navbar-left">
      <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span><?php echo ' '.$_SESSION["tipo"],': '.$_SESSION["usuario"]; ?></a>
  </ul>  

  <ul class="nav navbar-nav navbar-right">
      <li><a href="../index.php"><span class="glyphicon glyphicon-ban-circle"></span> Cerrar sesion</a></li>
  </ul>
</nav >

<br>
<br>
<div id="header">
      <ul class="nav">
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="agregar_usuario.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

        <li><a href="">Empleado</a>
          <ul>
            <li><a href="agregar_empleado.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Area</a>
          <ul>
            <li><a href="area_agregar.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Farmacia</a>
          <ul>
            <li><a href="agregar_producto.php">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Recursos Humanos</a>
          <ul>
            <li><a href="">Asignar Area</a>
              <ul>
                <li><a href="">Alta</a></li>
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>
              </ul></li>
            <li><a href="">Asignar sueldo</a>
              <ul>
                <li><a href="">Alta</a></li>
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>  
              </ul></li>
          </ul>
        </li>

           <li><a href="">Reportes</a>
          <ul>
            <li><a href="">Mostrar Nomina Total</a>
              <ul>
              <li><a href="">Por Area</a></li>
              <li><a href="">Por Sueldo</a></li>
              <li><a href="">Asistencia</a></li>  
              </ul></li>
            <li><a href="">Mostrar Todos Los Medicamentos</a>
              <ul>
                <li><a href="/PW//Hospital/pdf/reportes/interfaz_precio.php">Por precio</a></li>
              <li><a href="/PW/Hospital/pdf/reportes/interfaz_tipo.php">Por tipo</a></li> 
              </ul></li>
          </ul>
        </li>

      </ul>
    </div>
 
<div class='centrar'>
  
    <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left" align="center"> 
      <!--Formulario-->    
      <div class="col-sm-6">
      <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" name="registro" method="post" enctype="multipart/form-data">
      
      <div class="form-group">
        <label>Nombre del Usuario</label><br>
        <input type="text" class="col-md-6" name="nombre"  maxlength="60" placeholder="Nombre">
      </div>

      <div class="form-group">
        <label>Password</label><br>
        <input type="password" class="col-md-6" name="pass" maxlength="8" placeholder="Password">
      </div>

     <div class="form-group">
        <label>Nombre del empleado</label><br>
        
<select name="empleado">
  <?php
  while ($row=mysqli_fetch_array($consulta)) {
    echo "<option value='".$row['idEmpleado']."'>";
    echo $row['nombre']." ".$row['apellidoP']." ".$row['apellidoM'];
    echo "</option>";
  }
  ?>
</select>
      </div>


      <div class="form-group col-md-6">
            <input type="submit" name="registrar" class="btn btn-primary glyphicon glyphicon-plus" value="Registrar">
            <a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
      </div>
    </form>
  </div>
    <!--Formulario-->
      <div id="col-sm-4">  
        <img src="../imagenes/areasadd.png" class="img-circle" alt="Cinque Terre">  
      </div>
    </div>
    </div>
    <div class="col-sm-2 izquierda">
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