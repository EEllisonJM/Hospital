
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

.slider{
	width: 50%;
	margin: auto; 
	overflow: hidden;
}

.slider ul{
	display: flex;
	padding: 0;
	width: 400%;

	animation: cambio 20s infinite;
	animation-direction: alternate;
	animation-timing-function: ease-in;
}

.slider li{
	width: 100%;
	list-style: none;
}

.slider img{
	width: 100%;
}
@keyframes cambio{
0% {margin-left: 0;}
20% {margin-left: 0;}

25% {margin-left: -100%;}
45% {margin-left: -100%;}

50% {margin-left: -200%;}
70% {margin-left: -200%;}

75% {margin-left: -300%;}
100% {margin-left: -300%;}
}


</style>
</head>


<body>


<nav class="navbar navbar-inverse">

   <ul class="nav navbar-nav navbar-left">
      <li><a href="nosotros.php"><span class="glyphicon"></span> Nosotros </a></li>
      <a class="navbar-brand">|</a>
      <li><a href="contactos.php"><span class="glyphicon"></span> Contactos  </a></li>
      <a class="navbar-brand">   </a>
      <a class="navbar-brand">|</a>
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio  </a></li>
      <a class="navbar-brand">   </a>

  </ul>  

  <ul class="nav navbar-nav navbar-right">
      <li><a href="../Hospital/ses/logueo.php"><span class="glyphicon glyphicon-user"></span> Iniciar sesion</a></li>
  </ul>
</nav >

<div class="page-header text-center">
  <h1>Hospital General</h1>
</div>

<div class="slider">
	<ul>
		<li><img src="imagenes/img1.jpg"></li>
		<li><img src="imagenes/img2.jpg"></li>
		<li><img src="imagenes/img3.jpg"></li>
		<li><img src="imagenes/img4.jpg"></li>
	</ul>
</div>

  <p> 
      
  </p>
</body>

</html>
