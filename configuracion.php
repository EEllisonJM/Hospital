<?php
      $usuario ='root';//usuario segun registraron al instalar, sino el default es root
	  $password = ''; // contraseña que hayan puesto al instalar
	  $nombre_de_base = 'p3hospital'; //nombre de la base de datos creada
	  $puerto='5432'; //puerto default al instalar, si se lo cambian, simplemente cambienla
	  $host='localhost'; //servidor default localmente
	  $conexion=mysqli_connect("$host", "$usuario", "$password","$nombre_de_base"); //conexion php con mysql
?>