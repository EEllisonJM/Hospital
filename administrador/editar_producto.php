<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("../configuraciondb.php"); //conexion de base de datos
include("menu.php");
$verVisible = mysqli_query($conexion, "SELECT * FROM Area WHERE visible = 1");
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
 <center><label style="font-weight:bold; font-size: 30pt;">Listado de Productos</label></center>

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
   <td align="center" colspan="15">Datos</td>
</tr>
</thead>
<thead>
  <tr>
     <th>ID Producto</th>
     <th>Nombre</th>
     <th>Tipo</th>
     <th>Existencia</th>
     <th>Precio</th>
     <th>Visible</th>
     <th>Acciones</th>
  </tr>
</thead>
   <tr ng-repeat="x in names | filter:test:strict">
    <td>
        <div ng-hide="viewField">{{ x.idProducto | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.idProducto" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.nomProducto | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.nomProducto" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.tipoProducto | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.tipoProducto" /></div>
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
        <div ng-hide="viewField">{{ x.visible }}</div>
        <div ng-show="modifyField"><select name="Farmacia" ng-model="x.visible">
        <?php    
      echo "<option value='1'>";      
      echo Activo;
      echo "</option>";      
      echo "<option value='0'>";      
      echo Desactivado;
      echo "</option>";
    ?>
        </select></div>
    </td>
    <td>
        <button class="btn btn-warning" ng-hide="viewField" ng-click="modify(tableData)">Editar</button>
        <button class="btn btn-sucess" ng-show="modifyField" ng-click="update(x) ">Guardar</button>
        <!-- <button class="btn btn-danger" ng-hide="viewField" ng-click="delete(x)">Eliminar</button> -->

    </td>
  </tr>

</table>

</div>

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
$scope.update = function(tableData){
$http.post("../Update_Farmacia.php",{
  "idProducto":tableData.idProducto,
  "nomProducto":tableData.nomProducto,
  "tipoProducto":tableData.tipoProducto,
  "existencia":tableData.existencia,
  "precio":tableData.precio,
  "visible":tableData.visible } )
  .then(function(response){
        $scope.modifyField = false;
        $scope.viewField = false;
      })
//  .catch(angular.noop);
  .catch(function (error) {
            // pass the error the the error service
            return errorService.handleError(error);
          })
    };
$scope.delete = function(tableData){
  $http.post('../Delete_Farmacia.php',{
    "id":tableData.idEmpleado})
  $http.get("../BD_Farmacia.php")
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
