<?php require 'views/header.php';?>

<div class="container">
    <h2>Detalles de usuario</h2>
        <div ng-controller="adminCtrl">
            <h4>Usuario con Coreo electronico: {{lista.correoElectronico}}</h4>
            <hr />
            <dl class="dl-horizontal">
                <dt>
                    DNI
                </dt>

                <dd>
                    {{lista.DNI}}
                </dd>

                <dt>
                    Nombre
                </dt>

                <dd>
                    {{lista.nombre}}
                </dd>

                <dt>
                    Apellido
                </dt>

                <dd>
                    {{lista.apellido}}
                </dd>

                <dt>
                    Correo electronico
                </dt>

                <dd>
                    {{lista.correoElectronico}}
                </dd>

                <dt>
                    Contraseña
                </dt>

                <dd>
                    {{lista.password}}
                </dd>

                <dt>
                    Rol
                </dt>

                <dd>
                    {{lista.nombreRol}}
                </dd>

                <dt>
                    ¿Esta bloqueado?
                </dt>

                <dd>
                    {{lista.bloqueado}}
                </dd>

                <dt>
                    Provincia
                </dt>

                <dd>
                    {{lista.provincia}}
                </dd>

                <dt>
                    Ciudad
                </dt>

                <dd>
                    {{lista.ciudad}}
                </dd>

                <dt>
                    Dirección
                </dt>

                <dd>
                    {{lista.direccion}}
                </dd>

                <dt>
                    Código Postal
                </dt>

                <dd>
                    {{lista.codPostal}}
                </dd>

            </dl>

            <p>
                <a href="<?php echo constant('URL')?>/administrador/editarUsuario/{{lista.ID_usuario}}">Editar |</a>
                <a href="<?php echo constant('URL')?>/administrador">Volver a lista de usuarios</a>
                
            </p>
        </div>
    </div>


<?php require 'views/footer.php';?>