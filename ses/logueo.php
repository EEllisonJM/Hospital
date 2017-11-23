<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/miCSS.css">
</head>

<body>
  <nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="../nosotros.php"><span class="glyphicon glyphicon-globe"></span> Nosotros </a></li>
      <a class="navbar-brand">|</a>

      <li><a href="../contactos.php"><span class="glyphicon glyphicon-phone-alt"></span> Contactos  </a></li>
      <a class="navbar-brand">   </a>
      <a class="navbar-brand">|</a>

      <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Inicio  </a></li>
      <a class="navbar-brand"></a>
  </ul>

  <ul class="nav navbar-nav navbar-right">
      <li><a href="../ses/logueo.php"><span class="glyphicon glyphicon-user"></span> Iniciar sesion</a></li>
  </ul>
</nav >



<center >
  <center><div class="tit"><h2 style="color: #0000FF; ">Inicio de sesión</h2>

<form action="login.php" name="entrada_sistema" method="post" enctype="multipart/form-data">

<center><table border="0">
<tr><td><label ><b>Usuario</b></label></td>
<td width=80> <input type="text" name="user" value="" placeholder="Usuario" /> </td></tr>

<tr><td><label><b>Contraseña</b></label></td>
<td witdh=80><input type="password" name="pass" placeholder="Contraseña"  /> </td></tr>

<tr><td></td>

<td width=80 align=center>  <input type="submit" name="ingresar" class="btn btn-primary glyphicon glyphicon-plus" value="Ingresar"></td>
      </tr></tr>
  </table>
</form>
</center>

</body>
</html>
