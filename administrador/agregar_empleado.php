<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
include("menu.php");
$consulta = mysqli_query($conexion, "SELECT * FROM puesto");
if ($_SESSION["tipo"] == "ADMINISTRADOR" || $_SESSION["tipo"] == "GERENTE" || $_SESSION["tipo"] == "JEFE DE AREA" || $_SESSION["tipo"] == "ENCARGADO DE FARMACIA" || $_SESSION["tipo"] == "JEFE DE RECURSOS HUMANOS") {
    if ($_REQUEST['registrar'] == "Registrar") {
        $resultado = mysqli_query($conexion, "INSERT INTO empleado (idpuesto, apellidoP, apellidoM, nombre,sexo,fecha_nacimiento,telefono,calle,colonia,codigo_postal,ciudad, e_mail,visible)
VALUES ('" . $_REQUEST["puesto"] . "','" . $_REQUEST["apellidop"] . "','" . $_REQUEST["apellidom"] . "','" . $_REQUEST["nombre"] . "','" . $_REQUEST["sexo"] . "','" . $_REQUEST["fnace"] . "','" . $_REQUEST["telefono"] . "','" . $_REQUEST["calle"] . "','" . $_REQUEST["colonia"] . "','" . $_REQUEST["cp"] . "','" . $_REQUEST["ciudad"] . "','" . $_REQUEST["email"] . "','1')");
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
    <title>Hospital
    </title>
  </head>
  <body>

    <div class='centrar'>
      <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF']; ?>" name="registro" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>
              <label>Nombre
              </label>
            </td>
            <td>
              <input type="text" name="nombre" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
            <td>
              <label>Apelido Paterno
              </label>
            </td>
            <td>
              <input type="text" name="apellidop" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
            <td>
              <label>Apelido Materno
              </label>
            </td>
            <td>
              <input type="text" name="apellidom" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
          </tr>
          <tr>
            <td>
              <br>
              <br>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <label>Puesto
              </label>
            </td>
            <td>
              <select name="puesto">
                <?php
    while ($row = mysqli_fetch_array($consulta)) {
        echo "<option value='" . $row['idpuesto'] . "'>";
        echo $row['tipoempleado'];
        echo "</option>";
    }
?>
            </select>
            </td>
            <td>
              <label>Sexo
              </label>
            </td>
            <td>
              <select name="sexo">
                <option value="H">Hombre
                </option>
                <option value="M">Mujer
                </option>
              </select>
            </td>
            <td>
              <label>Fecha de Nacimiento
              </label>
            </td>
            <td>
              <input type="date" name="fnace" required />
            </td>
          </tr>
          <tr>
            <td>
              <br>
              <br>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <label>Telefono
              </label>
            </td>
            <td>
              <input type="text" name="telefono" pattern="[0-9]+" required>
            </td>
            <td>
              <label>Calle
              </label>
            </td>
            <td>
              <input type="text" name="calle" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
            <td>
              <label>Colonia
              </label>
            </td>
            <td>
              <input type="text" name="colonia" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
          </tr>
          <tr>
            <td>
              <br>
              <br>
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <label>Codigo postal
              </label>
            </td>
            <td>
              <input type="int" name="cp" pattern="[0-9]+" required>
            </td>
            <td>
              <label>Ciudad
              </label>
            </td>
            <td>
              <input type="text" name="ciudad" pattern="[A-Za-z ]+" style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
            <td>
              <label>Email
              </label>
            </td>
            <td>
              <input type="email" name="email"  style="text-transform:uppercase;"
                     onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="50" required>
            </td>
          </tr>
        </table>
        <br>
        <div class="form-group col-md-6">
          <input type="submit" name="registrar" class="btn btn-primary glyphicon glyphicon-plus" value="Registrar">
          <a class="btn btn-danger" href="admin.php" role="button">
            <span class="glyphicon glyphicon-share-alt">
            </span>
            Regresar
          </a>
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
else {
?>
<script>
  alert("Acceso Denegado");
  window.location = "../ses/logueo.php";
</script>
<?php
}
?> 
