<?php require 'views/header.php';?>

<div class="container">
    <h1>Sección del administrador</h1>
    
    <div class="row" ng-controller="adminCtrl">
        <h3 class="col-12">Usuarios registrados</h3>
        <div col="col-12">
            Para crear un usuario como administrador <a href="<?php echo constant('URL')?>/administrador/crearUsuarioAdmin"><strong>AQUI</strong></a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" >
                <tr>
                    <th>
                        DNI
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Correo Electronico
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        Bloqueado
                    </th>

                    <th></th>
                </tr>

                <tr ng-repeat="x in usuarios">
                    <td>
                        {{x.DNI}}
                    </td>
                    <td>
                        {{x.nombre}}
                    </td>
                    <td>
                        {{x.correoElectronico}}
                    </td>
                    <td>
                        {{x.nombreRol}}
                    </td>
                    <td>
                        {{x.bloqueado}}
                    </td>
                    <td>
                        <a href="<?php echo constant('URL')?>/administrador/mostrarUsuario/{{x.ID_usuario}}">Detalles</a> |
                        <a href="<?php echo constant('URL')?>/administrador/editarUsuario/{{x.ID_usuario}}" >Editar</a> |
                        <a href="" ng-click="eliminarUsuarioAdmin(x.ID_usuario)">Borrar</a>
                    </td>
                </tr>
                <div>{{mensajeDelete}}</div>
            </table>
        </div>
    </div>
    <div class="row" ng-controller="adminProductoCtrl">
        <h3 class="col-12">Productos registrados</h3>
        <div col="col-12">
            Para agregar nuevo producto <a href="<?php echo constant('URL')?>/administrador/agregarProducto"><strong>AQUI</strong></a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover" >
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Categoría
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Nºventas
                    </th>

                    <th></th>
                </tr>

                <tr ng-repeat="y in productos">
                    <td>
                        {{y.nombre}}
                    </td>
                    <td>
                        {{y.marca}}
                    </td>
                    <td>
                        {{y.categoria}}
                    </td>
                    <td>
                        {{y.precio}}
                    </td>
                    <td>
                        {{y.stock}}
                    </td>
                    <td>
                        {{y.numeroDeVentas}}
                    </td>
                    <td>
                        <a href="<?php echo constant('URL')?>/administrador/mostrarProducto/{{y.ID_producto}}">Detalles</a> |
                        <a href="<?php echo constant('URL')?>/administrador/editarProducto/{{y.ID_producto}}" >Editar</a> |
                        <a href="" ng-click="eliminarProducto(y.ID_producto)">Borrar</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>


<?php require 'views/footer.php';?>