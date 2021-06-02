    <?php require 'views/header.php';?>

    <div class="container">
        <h2>Detalles de producto.</h2>
        <div class="row" ng-controller="adminProductoCtrl">
            <!--  Imagen producto -->
            <div class="col-sm-12 col-md-6 ">
                <img class ="imgProducto"src="<?php echo constant('URL');?>/{{producto.imagen}}">
            </div>
            <!--  Imagen producto -->

            <!-- detalles de producto -->
            <div class="col-sm-12 col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{producto.nombre}}</h2>
                    <div>
                    </div>
                    <div>
                        <h3 class="product-price">{{producto.precio}}€</h3>
                        <span class="product-available">En Stock</span>
                    </div>
                    <p> {{producto.descripcion}}</p>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Cantidad
                            <div class="input-number">
                                <input type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al carro</button>
                    </div>
                </div>
                <p>
                    <a href="<?php echo constant('URL')?>/administrador/editarProducto/{{producto.ID_producto}}">Editar |</a>
                    <a href="<?php echo constant('URL')?>/administrador">Volver a lista de usuarios</a>
                </p>
            </div>
            <!-- detalles de producto -->
            
        </div>



    <?php require 'views/footer.php';?>