<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //no mostrar errores de sintaxis
include("menu.php");
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

 <center><label style="font-weight:bold; font-size: 30pt;">Listado de Empleados</label></center>

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
   <td align="center" colspan="14">Datos</td>
</tr>
</thead>
<thead>
  <tr>
     <th>ID Empleado</th>
     <th>ID Puesto</th>
     <th>Nombre</th>
     <th>Apellido Paterno</th>
     <th>Apellido Materno</th>
     <th>Sexo</th>
     <th>Fecha Nacimiento</th>
     <th>Telefono</th>
     <th>Calle</th>
     <th>Colonia</th>
     <th>CP</th>
     <th>Ciudad</th>
     <th>Email</th>
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
        <div ng-hide="viewField">{{ x.idpuesto | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.idpuesto" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.nombre | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.nombre" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.apellidoP | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.apellidoP" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.apellidoM | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.apellidoM" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.sexo | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.sexo" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.fecha_nacimiento | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.fecha_nacimiento" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.telefono | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.telefono" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.calle | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.calle" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.colonia | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.colonia" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.codigo_postal | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.codigo_postal" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.ciudad | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.ciudad" /></div>
    </td>
    <td>
        <div ng-hide="viewField">{{ x.e_mail | uppercase }}</div>
        <div ng-show="modifyField"><input type="text" ng-model="x.e_mail" /></div>
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
$http.get("../BD_Empleado.php")
  .then(function (response) {
    $scope.names = response.data.datos;
    $scope.mirespuesta=null;
  });

$scope.modify = function(tableData) {
    $scope.modifyField = true;
    $scope.viewField = true;
  };

$scope.update = function(tableData){
$http.post("../Update_Empleado.php",{
  "idEmpleado":tableData.idEmpleado,
  "idpuesto":tableData.idpuesto,
  "nombre":tableData.nombre,
  "apellidoP":tableData.apellidoP,
  "apellidoM":tableData.apellidoM,
  "sexo":tableData.sexo,
  "fecha_nacimiento":tableData.fecha_nacimiento,
  "telefono":tableData.telefono,
  "calle":tableData.calle,
  "colonia":tableData.colonia,
  "codigo_postal":tableData.codigo_postal,
  "ciudad":tableData.ciudad,
  "e_mail":tableData.e_mail,
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
  $http.post('../Delete_Empleado.php',{
    "id":tableData.idEmpleado})
  $http.get("../BD_Empleado.php")
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
