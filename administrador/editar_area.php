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
<body>
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
          <td align="center" colspan="4">Datos</td>
        </tr>
      </thead>

    <thead>
      <tr>
        <th>Nombre</th>
        <th>descripcion</th>
        <th>Visible</th>
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
        <div ng-hide="viewField">{{ x.visible | uppercase }}</div>
        <div ng-show="modifyField">
          <select ng-model="x.visible">
        <?php
      echo "<option value='" . "1" . "'>";
      echo "Activado";
      echo "</option>";
      
      echo "<option value='" . "0" . "'>";
      echo "Desactivado";
      echo "</option>";
    ?>
        </select>
      </div>
    </td>
    <td>
        <button class="btn btn-warning" ng-hide="viewField" ng-click="modify(tableData)">Editar</button>
        <button class="btn btn-sucess" ng-show="modifyField" ng-click="update(x) ">Guardar</button>
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
$scope.update = function(tableData){
$http.post("../Update_Area.php",{
  "id":tableData.id,
  "nombre":tableData.nombre,
  "descripcion":tableData.descripcion,
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
