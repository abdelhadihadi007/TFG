<?php require 'views/header.php';?>

<div class="container">
    <h2>Crear usuario</h2>
        <div ng-controller="adminCtrl">
            <div class="col-md-6 col-xl-5 mb-4">
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Nombre</label>
                    <input type="text" ng-model="nombreAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Apellido</label>
                    <input type="text" ng-model="apellidoAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-address-card"></i>
                    <label for="">DNI</label>
                    <input type="text" ng-model="dniAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-envelope"></i>
                    <label for="">Correo electrónico</label>
                    <input type="email" ng-model="correoElecAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-lock"></i>
                    <label for="">Contraseña</label>
                    <input type="password" ng-model="passwordAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-lock"></i>
                    <label for="">Confirmar contraseña</label>
                    <input type="password" ng-model="confirPwdAdmin" class="form-control">
                    <div>{{contraincorrecta}}</div>
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Rol</label>
                    <input type="text" ng-model="nombreRolAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Provincia</label>
                    <input type="text" ng-model="provinciaAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Ciudad</label>
                    <input type="text" ng-model="ciudadAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Direccion</label>
                    <input type="text" ng-model="direccionAdmin" class="form-control">
                </div>
                <div class="form">
                    <i class="fa fa-wpforms"></i>
                    <label for="">Codigo postal</label>
                    <input type="text" ng-model="codPostalAdmin" class="form-control">
                </div>
                <button class="btn btn-primary" type="button" ng-click="registrarAdmin()">Registrar</button>
            </div>
        </div>
    </div>


<?php require 'views/footer.php';?>