<?php require 'views/header.php';?>

<div class="container">
    <h2>Crear Producto</h2>
        <div ng-controller="adminProductoCtrl">
            <div class="col-md-6 col-xl-5 mb-4">
                <div class="form">
                    <label for="">Nombre</label>
                    <input type="text" ng-model="nombreProducto" class="form-control">
                </div>
                <div class="form">
                    <label for="">Descripción</label>
                    <textarea ng-model="descripcionProducto" rows="10" cols="10" class="form-control">Descripcion del producto...</textarea>
                </div>
                <div class="form">
                    <label for="">Marca</label>
                    <input type="text" ng-model="marcaProducto" class="form-control">
                </div>
                <div class="form">
                    <label for="">Categoria</label>
                    <input type="text" ng-model="categoriaProducto" class="form-control">
                </div>
                <div class="form">
                    <label for="">Precio</label>
                    <input type="number" ng-model="precioProducto" class="form-control">
                </div>
                <div class="form">
                    <label for="">Stock</label>
                    <input type="number" ng-model="stockProducto" class="form-control">
                </div>
                <div class="form">
                    <label for="">ID_mascota</label>
                    <input type="number" ng-model="ID_mascotaProducto" class="form-control">
                </div>
                
                <div class="form" enctype="multipart/form-data">
                    <label for="">Imagen</label>
                    <!--<input name="uploadedfile" ng-model="imagenProducto" type="file" class="form-control" />-->
                    <input type = "file" file-model = "myFile"/>
                    <button ng-click = "uploadFile()">Upload File</button>
                </div>
                

                <button class="btn btn-primary" type="button" ng-click="crearProducto()">Registrar</button>
            </div>
        </div>
    </div>


<?php require 'views/footer.php';?>