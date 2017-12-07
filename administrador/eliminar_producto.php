<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
include("menu.php");
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
          <td align="center" colspan="6">Datos</td>
        </tr>
      </thead>

    <thead>
      <tr>
        <th>Id Producto</th>
        <th>Nombre</th>
        <th>Tipo producto</th>
        <th>Existencia</th>
        <th>Precio</th>
        <th>Visible</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tr ng-repeat="x in names | filter:test:strict">
     <td>
         <div ng-hide="viewField">{{ x.idproducto | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.idproducto" /></div>
     </td>
     <td>
         <div ng-hide="viewField">{{ x.nomproducto | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.nomproducto" /></div>
     </td>
     <td>
         <div ng-hide="viewField">{{ x.tipoproducto | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.tipoproducto" /></div>
     </td>
     <td>
         <div ng-hide="viewField">{{ x.existencia | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.existencia" /></div>
     </td>
     <td>
         <div ng-hide="viewField">{{ x.precio | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.precio" /></div>
     </td>
     <td>
         <div ng-hide="viewField">{{ x.visible | uppercase }}</div>
         <div ng-show="modifyField"><input type="text" ng-model="x.visible" /></div>
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
$http.get("../BD_Farmacia.php")
  .then(function (response) {
    $scope.names = response.data.datos;
    $scope.mirespuesta=null;
  });
$scope.modify = function(tableData) {
    $scope.modifyField = true;
    $scope.viewField = true;
  };
$scope.delete = function(tableData){
  $http.post('../Delete_Farmacia.php',{
    "id":tableData.idproducto})
  $http.get("../BD_Farmacia.php")
      .then(function (response) {
        $scope.names = response.data.datos;
        $scope.mirespuesta=null;
      });
    };
});
</script>
