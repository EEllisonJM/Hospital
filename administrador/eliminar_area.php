<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
include("menu.php");
if ($_SESSION["tipo"] == "ADMINISTRADOR" ||  $_SESSION["tipo"] == "JEFE DE AREA") {
?>
<html>
<script src="../angular.min.js"></script>
<head>
 <meta charset="UTF-8">
  <title>Hospital</title>
</head>

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
    <td>
        <button class="btn btn-danger" ng-hide="viewField" ng-click="delete(x)">Eliminar</button>
    </td>
  </tr>
</table>
</div>
<div class="col-md-8">
  <div class="col-sm-9"></div>
<center><a class="btn btn-danger" href="admin.php" role="button"><span class="glyphicon glyphicon-share-alt"></span>
          Regresar</a>
</center>
</div>
</body>
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

