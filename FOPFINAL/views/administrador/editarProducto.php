<?php require 'views/header.php';?>

<div class="container" ng-controller="adminProductoCtrl">
    <h2>Editar producto con nombre: {{producto.nombre}}</h2>
        <div >
            <div class="col-md-6 col-xl-5 mb-4">
                <div class="form">
                    <label for="">Nombre</label>
                    <input type="text" ng-model="producto.nombre" ng-change="inputChangeProducto()" class="form-control">
                </div>
                <div class="form">
                    <label for="">Descripción</label>
                    <textarea ng-model="producto.descripcion" ng-change="inputChangeProducto()" rows="10" cols="10" class="form-control">Descripcion del producto...</textarea>
                </div>
                <div class="form">
                    <label for="">Marca</label>
                    <input type="text" ng-model="producto.marca" ng-change="inputChangeProducto()" class="form-control">
                </div>
                <div class="form">
                    <label for="">Categoria</label>
                    <input type="text" ng-model="producto.categoria" ng-change="inputChangeProducto()" class="form-control">
                </div>
                <div class="form">
                    <label for="">Precio</label>
                    <input type="text" ng-model="producto.precio" ng-change="inputChangeProducto()" class="form-control">
                </div>
                <div class="form">
                    <label for="">Stock</label>
                    <input type="text" ng-model="producto.stock" ng-change="inputChangeProducto()" class="form-control">
                </div>
                <button class="btn btn-primary" type="button" ng-click="editarProducto()">Registrar</button>
                <div>
                    <strong>{{respuestaUpdate}}</strong>
                </div>
            </div>
        </div>
    </div>


<?php require 'views/footer.php';?>