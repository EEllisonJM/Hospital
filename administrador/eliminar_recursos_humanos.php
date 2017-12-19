<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("menu.php");
if($_SESSION["tipo"]=="ADMINISTRADOR"||$_SESSION["tipo"]=="JEFE DE RECURSOS HUMANOS")
{
?>
<html>
<script src="../angular.min.js"></script>
<head>
 <meta charset="UTF-8">
  <title>Hospital</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="estilo_admin.css">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

 <center><label style="font-weight:bold; font-size: 30pt;">Recursos Humanos</label></center>

<div ng-app="myApp" ng-controller="namesCtrl" class="centrar col-md-6" >
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
   <td align="center" colspan="5">Datos</td>
</tr>
</thead>
<thead>
  <tr>
     <th>ID Empleado</th>
     <th>ID Area</th>
     <th>Hora de entrada</th>
     <th>Hora de salida</th>
     <th>Bonificacion</th>
     <!-- <th>Visible</th> -->
     <th>Acciones</th>
  </tr>
</thead>
   <tr ng-repeat="x in names | filter:test:strict">
    <td>
        <div ng-hide="viewField">{{ x.idEmpleado | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.idEmpleado" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.idArea | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.idArea" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.horaEntrada | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.horaEntrada" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.horaSalida | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.horaSalida" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.bonificacion | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.bonificacion" /></div>
    </td>
 <!--    <td>
        <div ng-hide="viewField">{{ x.visible | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.visible" /></div>
    </td> -->
    <td>
        <!-- <button class="btn btn-warning" ng-hide="viewField" ng-click="modify(tableData)">Editar</button>
        <button class="btn btn-sucess" ng-show="modifyField" ng-click="update(x) ">Guardar</button> -->
        <button class="btn btn-danger" ng-hide="viewField" ng-click="delete(x)">Eliminar</button>

    </td>
  </tr>

</table>

</div>

<script>
angular.module('myApp', []).controller('namesCtrl', function($scope, $http) {
$http.get("../BD_RecursosHumanos.php")
  .then(function (response) {
    $scope.names = response.data.datos;
    $scope.mirespuesta=null;
  });

$scope.modify = function(tableData) {
    $scope.modifyField = true;
    $scope.viewField = true;
  };
  
$scope.delete = function(tableData){
  $http.post('../Delete_RecursosHumanos.php',{
    "id":tableData.idEmpleado})
  $http.get("../BD_RecursosHumanos.php")
      .then(function (response) {
        $scope.names = response.data.datos;
        $scope.mirespuesta=null;
      });
    };
});

</script>

<div class="col-md-8">
<center><a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</center>
</div>
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