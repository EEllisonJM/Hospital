<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
   $consulta=mysqli_query($conexion, "SELECT * FROM puesto");
   
if($_SESSION["tipo"]=="ADMINISTRADOR"||$_SESSION["tipo"]=="GERENTE"||$_SESSION["tipo"]=="JEFE DE AREA"||$_SESSION["tipo"]=="ENCARGADO DE FARMACIA"||$_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS")
{
  
if($_REQUEST['registrar'] == "Registrar") 
{
    
  $resultado = mysqli_query($conexion,"INSERT INTO empleado (idpuesto, apellidoP, apellidoM, nombre,sexo,fecha_nacimiento,telefono,calle,colonia,codigo_postal,ciudad, e_mail,visible) 
  VALUES ('".$_REQUEST["puesto"]."','".$_REQUEST["apellidop"]."','".$_REQUEST["apellidom"]."','".$_REQUEST["nombre"]."','".$_REQUEST["sexo"]."','".$_REQUEST["fnace"]."','".$_REQUEST["telefono"]."','".$_REQUEST["calle"]."','".$_REQUEST["colonia"]."','".$_REQUEST["cp"]."','".$_REQUEST["ciudad"]."','".$_REQUEST["email"]."','1')");

?>
       <script>
                  alert("Usuario Agregado con exito");
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
  
<form class="form-horizontal" action="<?=$_SERVER['PHP_SELF'];?>" name="registro" method="post" enctype="multipart/form-data">
    <table>
    <tr>
      <td><label>Nombre</label></td>
          <td><input type="text" name="nombre" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>

        <td><label>Apelido Paterno</label></td>
          <td><input type="text" name="apellidop" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>

     <td><label>Apelido Paterno</label></td>
          <td><input type="text" name="apellidom" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>
    </tr>

<tr><td><br><br><br></td></tr>

    <tr>
      <td><label>Puesto</label></td>
      <td><select name="puesto">
      <?php
          while ($row=mysqli_fetch_array($consulta)) {
            echo "<option value='".$row['idpuesto']."'>";
            echo $row['tipoempleado'];
            echo "</option>";
          }
        ?>
      </select></td>


<td><label>Sexo</label></td>
        <td><select name="sexo">
            <option value="H">Hombre</option>
          <option value="M">Mujer</option>
        </select>
      </td>

<td><label>Fecha de Nacimiento</label></td>
        <td><input type="date" name="fnace" required /></td>
    </tr>

<tr><td><br><br><br></td></tr>

    <tr>
      <td><label>Telefono</label></td>
         <td><input type="text" name="telefono" pattern="[0-9]+" required></td>

      <td><label>Calle</label></td>
         <td><input type="text" name="calle" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>

      <td><label>Colonia</label></td>
         <td><input type="text" name="colonia" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>
      </tr>

      <tr><td><br><br><br></td></tr>

    <tr>
      <td><label>Codigo postal</label></td>
       <td><input type="int" name="cp" pattern="[0-9]+" required></td>

      <td><label>Ciudad</label></td>
        <td> <input type="text" name="ciudad" pattern="[A-Za-z ]+" style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>

      <td><label>Email</label></td>
         <td><input type="email" name="email"  style="text-transform:uppercase;" 
        onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required></td>
    </tr>

  </table>  
  <br>
      <div class="form-group col-md-6">
            <input type="submit" name="registrar" class="btn btn-primary glyphicon glyphicon-plus" value="Registrar">
            <a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
      </div>
</form>
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