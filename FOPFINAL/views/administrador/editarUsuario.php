<?php require 'views/header.php';?>

    <div class="container" ng-controller="adminCtrl">
    
    <h2>Editar usuario {{lista.correoElectronico}}</h2>
        <div >
            <div class="col-md-6 col-xl-5 mb-4">
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Nombre</label>
                    <input type="text" ng-model="lista.nombre" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Apellido</label>
                    <input type="text" ng-model="lista.apellido" ng-change="inputChange()"  class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-address-card"></i>
                    <label for="">DNI</label>
                    <input type="text" ng-model="lista.DNI" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-envelope"></i>
                    <label for="">Correo electrónico</label>
                    <input type="email" ng-model="lista.correoElectronico" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Rol (administrador o usuario)</label>
                    <input type="text" ng-model="lista.nombreRol" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">¿Bloquear? (SI o NO)</label>
                    <input type="text" ng-model="lista.bloqueado" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Provincia</label>
                    <input type="text" ng-model="lista.provincia" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Ciudad</label>
                    <input type="text" ng-model="lista.ciudad" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Direccion</label>
                    <input type="text" ng-model="lista.direccion" ng-change="inputChange()" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Codigo postal</label>
                    <input type="text" ng-model="lista.codPostal" ng-change="inputChange()" class="form-control">
                </div>
                <button class="btn btn-primary" type="button" ng-click="registrarCambiadoAdmin()">Registrar</button>
            </div>
        </div>


<?php require 'views/footer.php';?>