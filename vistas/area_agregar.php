<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include ("../configuraciondb.php"); //conexion de base de datos

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
    
  $resultado = mysqli_query($conexion,"INSERT INTO area (nombre, descripcion, visible) 
  VALUES ('".$_REQUEST["nombre"]."','".$_REQUEST["descripcion"]."', '1')");
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
<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
  <style type="text/css">
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
        hr {
            border:3px solid #000;
            border-color: #A7DBD8;
        }
        #imagentop {
          background-position: center;
        }

        * {
        margin:0px;
        padding:0px;
      }

      #header {
        margin:auto;
        width:1100px;
        font-family:Arial, Helvetica, sans-serif;
      }
      
      ul, ol {
        list-style:none;
      }
      
      .nav > li {
        float:left;

      }
      
      .nav li a {
        background-color:#000;
        color:#fff;
        text-decoration:none;
        padding:12px 40px;
        display:block;
      }
      
      .nav li a:hover {
        background-color:#434343;
      }
      
      .nav li ul {
        display:none;
        position:absolute;
        min-width:150px;
      }
      
      .nav li:hover > ul {
        display:block;
      }
      
      .nav li ul li {
        position:relative;
      }
      
      .nav li ul li ul {
        right:-150px;
        top:0px;
      }

  .centrar
  {

    margin-left: 200px;
    margin-top: 132px;
  }

  </style>
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
		
		<?php if($_SESSION["tipo"]=="ADMINISTRADOR"){ ?>
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php
		}
		
		if($_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Empleado</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Area</a>
          <ul>
            <li><a href="area_agregar.php">Alta</a></li>
            <li><a href="mostrar_area.php">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Farmacia</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>
		<?php }
		
		if($_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS"||$_SESSION["tipo"]=="ADMINISTRADOR"){?>
        <li><a href="">Recursos Humanos</a>
          <ul>
            <li><a href="">Asignar Area</a>
              <ul>
               <li><a href="">Editar</a></li>
               <li><a href="">Baja</a></li>
              </ul></li>
            <li><a href="">Asignar sueldo</a>
              <ul>
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
               <li><a href="">Por precio</a></li>
              <li><a href="">Port tipo</a></li> 
              </ul></li>
          </ul>
        </li>
		<?php } ?>

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
        <label>Nombre</label><br>
        <input type="text" class="col-md-6" name="nombre" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="60" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label>Descripcion</label><br>
        <input type="text" class="col-md-6" name="descripcion" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="80" placeholder="Descripción">
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
