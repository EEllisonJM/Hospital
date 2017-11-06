<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> 
<style type="text/css">
        hr  {
            border:10px solid #000;
            border-color: #A7DBD8;
        }
        h1 {
          color: #5bc0de;
          font-family: Times;
        }
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
      <a class="navbar-brand">Hospital</a>

    </div>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> cerrar sesion</a></li>
  </ul>
  
</nav>
  <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <br>
      <h1 >Bienvenido</h1>
     

      <h3>Opciones</h3>
      <table class="table table-striped color" align="center" >
	    <thead>
	    </thead>
	   	<thead>
	      <tr>
	        <th><a class="btn btn-primary" href="add.php" role="button"><span class="glyphicon glyphicon-plus"></span>
          Agregar</a></th>
	        <th><a class="btn btn-success" href="mostrar_area.php"  role="button"><span class="glyphicon glyphicon-pencil">Editar</a></th>
	        <th><a class="btn btn-danger" href="mostrar_area.php" role="button"><span class="glyphicon glyphicon-remove">Eliminar</a></th>
	      </tr>
	    </thead>
	  </table>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

  <p> 
      
  </p>
</body>

</html>
