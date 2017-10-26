<?php
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("configuracion.php"); //conexion de base de datos
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<center>
<form action="../proyecto hospital/login.php" name="entrada_sistema" method="post" enctype="multipart/form-data">

<label>Usuario</label>
<input type="text" name="user" value="" /><br />

<label>Contraseña</label>
<input type="text" name="pass" /> <br />

<input type="submit" name="ingresar" value="Ingresar">
</form>
</center>

</body>
</html>