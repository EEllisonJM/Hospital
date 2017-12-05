

<html xmlns="http://www.w3.org/1999/xhtml">
<script src="../angular.min.js"></script>
<head>
 <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
</head>
<body>
<nav class="navbar navbar-inverse">
   <ul class="nav navbar-nav navbar-left">
      <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span>  Administrador </a>
  </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="../index.php"><span class="glyphicon glyphicon-ban-circle"></span> Cerrar sesion</a></li>
  </ul>
</nav >
<br>

<div class="col-sm-12" id="header">
  <div class="col-sm-2"></div>
      <ul class="nav">
        <li><a href="">Usuario</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

        <li><a href="">Empleado</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="eliminar_empleado.php">Baja</a></li>
            <li><a href="mostrar_empleado.php">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Area</a>
          <ul>
            <li><a href="area_agregar.php">Alta</a></li>
            <li><a href="eliminar_area.php">Baja</a></li>
            <li><a href="mostrar_area.php">Editar</a></li>
          </ul>
        </li>

         <li><a href="">Farmacia</a>
          <ul>
            <li><a href="">Alta</a></li>
            <li><a href="">Baja</a></li>
            <li><a href="">Editar</a></li>
          </ul>
        </li>

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
              </ul>
            </li>
          </ul>
        </li>


      </ul><!--Menu-->
      <br><br>
</div><!--Termina Div del Menu-->
 <center><label style="font-weight:bold; font-size: 30pt;">Listado de areas</label></center>

<div ng-app="myApp" ng-controller="namesCtrl" class="centrar col-md-8" >
  <div class="container col-sm-12">
    <div class="col-sm-3"></div>
    <button align="center" class="btn btn-primary" ng-click="test.visible=''">Mostrar Todos</button>
    <button align="center" class="btn btn-primary" ng-click="test.visible=1">Mostrar Activos</button>
    <button align="center" class="btn btn-primary" ng-click="test.visible=0">Mostrar Inactivos</button>
    <br><br>
  </div>
    

  <table border="2" align="center" class="table table-striped"> 
      <thead>
        <tr>
          <td align="center" colspan="3">Datos</td>
        </tr>
      </thead>

    <thead>
      <tr>
        <th>Nombre</th>
        <th>descripcion</th>
        <!-- <th>Visible</th> -->
        <th>Acciones</th>
      </tr>
    </thead>

  <tr ng-repeat="x in names | filter:test:strict">
    <td>
        <div ng-hide="viewField">{{ x.nombre | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.nombre" /></div>
    </td>
    
    <td>
        <div ng-hide="viewField">{{ x.descripcion | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.descripcion" /></div>
    </td>
   <!--  <td>
        <div ng-hide="viewField">{{ x.visible | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.visible" /></div>
    </td> -->
    <td>
        <!-- <button class="btn btn-warning" ng-hide="viewField" ng-click="modify(tableData)">Editar</button>
        <button class="btn btn-sucess" ng-show="modifyField" ng-click="update(x) ">Guardar</button> -->
        <button class="btn btn-danger" ng-hide="viewField" ng-click="delete(x)">Eliminar</button>
    </td>

  </tr>
    <!-- </li> -->

    <!-- </ul> -->
  </table>

</div>


<div class="col-md-8">
  <div class="col-sm-9"></div>
<center><a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</center>
</div>
</body>


<!-- INICIO ESTILO -->
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
<!-- FIN    ESTILO -->
</html>






<!-- FUNCIONES -->
<script>
angular.module('myApp', []).controller('namesCtrl', function($scope, $http) {
$http.get("../BDArea.php")
  .then(function (response) {
    $scope.names = response.data.datos;
    $scope.mirespuesta=null;
  });

$scope.modify = function(tableData) {
    $scope.modifyField = true;
    $scope.viewField = true;
  };

// $scope.update = function(tableData){
// $http.post("../Update_Area.php",{
//   "id":tableData.id,
//   "nombre":tableData.nombre,
//   "descripcion":tableData.descripcion,
//   "visible":tableData.visible } )
//   .then(function(response){
//         $scope.modifyField = false;
//         $scope.viewField = false;
//       })
// //  .catch(angular.noop);
//   .catch(function (error) {
//             // pass the error the the error service
//             return errorService.handleError(error);
//           })
//     };

$scope.delete = function(tableData){
  $http.post('../Delete_Area.php',{
    "id":tableData.id})
  $http.get("../BDArea.php")
      .then(function (response) {
        $scope.names = response.data.datos;
        $scope.mirespuesta=null;
      });
    };
});

</script>

