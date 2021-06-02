//COntrolador Angualar para la seccion principal
app.controller("mainCtrl", function($scope, $http) {

    $http.get("administrador/mostrarProductos")
        .then(function(response) {
            console.log(response.data);
            $scope.productos = response.data;

            for (x = 0; x < $scope.productos.length; x++) {
                console.log($scope.productos[x]);
                $scope.ordenarVentas = $scope.productos[x].numeroDeVentas;
                console.log($scope.ordenarVentas);
            }
        })
})


//Conrolador AngularJS para la sección Usuario
app.controller("userCtrl", function($scope, $http, $window) {
    $scope.iniciarSesion = function() {
        console.log($scope.correoIniciar);
        if ($scope.correoIniciar == undefined && $scope.passIniciar == undefined) {
            $scope.notUser = "Introduzca el correo y la contraseña"
        } else {
            var correoIniciar = $scope.correoIniciar;
            var passIniciar = $scope.passIniciar;
            data = {
                'correoIniciar': correoIniciar,
                'passwordIniciar': passIniciar
            }

            localStorage.setItem("correo", correoIniciar);


            $http.get("registrar/IniciarSesion", { params: data })
                .then(function(response) {
                    console.log(response.data);
                    if (response.data == "") {
                        $scope.notUser = "Usuario no registrado";
                    } else if (response.data == "Contraseña incorrecta") {
                        $scope.notUser = "La contraseña no es correcta";
                    } else if (response.data == "OK") {
                        $scope.notUser = "";
                        $window.location.href = "main"
                    }
                })
        }

    }

    $scope.registrarUsuario = function() {
        if ($scope.passwordUsuario != $scope.confirPwdUsuario) {
            $scope.contraincorrecta = "Las contraseñas no coinciden";
            $scope.passwordUsuario = "";
            $scope.confirPwdUsuario = "";
        } else {
            data = {
                nombre: $scope.nombreUsuario,
                apellido: $scope.apellidoUsuario,
                DNI: $scope.dniUsuario,
                correoElec: $scope.correoElecUsuario,
                password: $scope.passwordUsuario,
                provincia: $scope.provinciaUsuario,
                ciudad: $scope.ciudadUsuario,
                direccion: $scope.direccionUsuario,
                codPostal: $scope.codPostalUsuario
            }
            $http.get("registrar/registrarUsuario", { params: data })
                .then(function(response) {
                    console.log(response.data);
                })
        }
    }
})

//Conrolador AngularJS para la sección Administrador de usuarios
app.controller("adminCtrl", function($scope, $http, $window, $location) {
    $scope.registrarAdmin = function() {
        if ($scope.passwordAdmin != $scope.confirPwdAdmin) {
            $scope.contraincorrecta = "Las contraseñas no coinciden";
            $scope.passwordAdmin = "";
            $scope.confirPwdAdmin = "";
        } else {
            data = {
                nombre: $scope.nombreAdmin,
                apellido: $scope.apellidoAdmin,
                DNI: $scope.dniAdmin,
                correoElec: $scope.correoElecAdmin,
                password: $scope.passwordAdmin,
                nombreRol: $scope.nombreRolAdmin,
                provincia: $scope.provinciaAdmin,
                ciudad: $scope.ciudadAdmin,
                direccion: $scope.direccionAdmin,
                codPostal: $scope.codPostalAdmin
            }
            $http.get("administrador/crearUsuarioAdmin", { params: data })
                .then(function(response) {
                    console.log(response.data);
                })
        }
    }

    var urlActual = $location.absUrl().split('/');
    console.log(urlActual);
    var controlador = urlActual[4];
    var metodo = urlActual[5];
    var idUser = urlActual[6];

    if (controlador == "administrador" && metodo == undefined) {
        $http.get("administrador/mostrarUsuarios")
            .then(function(response) {
                console.log(response.data);
                $scope.usuarios = response.data;
            })
    }

    $id = urlActual[6];
    console.log($id);

    data = {
        id: $id
    }

    console.log(data);
    $http.get('/FOPFINAL/administrador/mostrar', { params: data })
        .then(function(response) {
            console.log(response.data);
            $scope.lista = response.data;
        })

    $scope.inputChange = function() {
        $scope.nombreCambiado = $scope.lista.nombre;
        $scope.apellidoCambiado = $scope.lista.apellido;
        $scope.DNICambiado = $scope.lista.DNI;
        $scope.correoElectronicoCambiado = $scope.lista.correoElectronico;
        $scope.RolCambiado = $scope.lista.nombreRol;
        $scope.bloqueadoCambiado = $scope.lista.bloqueado;
        $scope.provinciaCambiado = $scope.lista.provincia;
        $scope.ciudadCambiado = $scope.lista.ciudad;
        $scope.direccionCambiado = $scope.lista.direccion;
        $scope.codPostalCambiado = $scope.lista.codPostal;

        $scope.listaCambiada = {
            ID_usuario: $scope.lista.ID_usuario,
            nombre: $scope.nombreCambiado,
            apellido: $scope.apellidoCambiado,
            DNI: $scope.DNICambiado,
            correoElectronico: $scope.correoElectronicoCambiado,
            password: $scope.lista.password,
            nombreRol: $scope.RolCambiado,
            bloqueado: $scope.bloqueadoCambiado,
            provincia: $scope.provinciaCambiado,
            ciudad: $scope.ciudadCambiado,
            direccion: $scope.direccionCambiado,
            codPostal: $scope.codPostalCambiado
        }
        console.log($scope.listaCambiada);
    }
    $scope.registrarCambiadoAdmin = function() {
        var data = $scope.listaCambiada;
        console.log(data);
        $http.get('/FOPFINAL/administrador/registrar', { params: data })
            .then(function(response) {
                console.log(response.data);
            })
    }

    $scope.eliminarUsuarioAdmin = function(idUsertoDelete) {
        console.log(idUsertoDelete);
        data = {
            ID_usuario: idUsertoDelete
        }
        console.log(data);
        $http.get('/FOPFINAL/administrador/eliminarUsuario', { params: data })
            .then(function(response) {
                console.log(response.data);
                if (response.data == "Usuario borrado correctamente") {
                    $scope.mensajeDelete = "¡Usuario borrado correctamente!";
                    $window.location.reload();
                }
            })
    }
})

//Conrolador AngularJS para la sección Administrador de peoductos
app.controller("adminProductoCtrl", function($scope, $http, $window, $location) {

    $scope.crearProducto = function() {

        data = {
            nombre: $scope.nombreProducto,
            descripcion: $scope.descripcionProducto,
            marca: $scope.marcaProducto,
            categoria: $scope.categoriaProducto,
            precio: $scope.precioProducto,
            stock: $scope.stockProducto,
            ID_mascota: $scope.ID_mascotaProducto,
            imagen: $scope.imagenProducto
        }
        console.log(data);
        $http.get("administrador/agregarprodu", { params: data })
            .then(function(response) {
                console.log(response.data);
            })
    }

    var urlActual = $location.absUrl().split('/');
    console.log(urlActual);
    var controlador = urlActual[4];
    var metodo = urlActual[5];
    var idUser = urlActual[6];

    if (controlador == "administrador" && metodo == undefined) {
        $http.get("administrador/mostrarProductos")
            .then(function(response) {
                console.log(response.data);
                $scope.productos = response.data;
            })
    }

    $id = urlActual[6];
    console.log($id);

    data = {
        id: $id
    }

    console.log(data);
    $http.get('/FOPFINAL/administrador/mostrarPro', { params: data })
        .then(function(response) {
            console.log(response.data);
            $scope.producto = response.data;
        })

    $scope.inputChangeProducto = function() {
        $scope.nombreCambiado = $scope.producto.nombre;
        $scope.descripcionCambiado = $scope.producto.descripcion;
        $scope.marcaCambiado = $scope.producto.marca;
        $scope.categoriaCambiado = $scope.producto.categoria;
        $scope.precioCambiado = $scope.producto.precio;
        $scope.stockCambiado = $scope.producto.stock;


        $scope.listaCambiada = {
            ID_producto: $scope.producto.ID_producto,
            nombre: $scope.nombreCambiado,
            descripcion: $scope.descripcionCambiado,
            marca: $scope.marcaCambiado,
            categoria: $scope.categoriaCambiado,
            precio: $scope.precioCambiado,
            stock: $scope.stockCambiado,
            fecha_publicacion: $scope.producto.fecha_publicacion,
            imagen: $scope.producto.imagen,
            numeroDeVentas: $scope.producto.numeroDeVentas
        }
        console.log($scope.listaCambiada);
    }
    $scope.editarProducto = function() {
        var data = $scope.listaCambiada;
        console.log(data);
        $http.get('/FOPFINAL/administrador/actualizarProducto', { params: data })
            .then(function(response) {
                console.log(response.data);
                if (response.data == "Producto actualizado correctamente") {
                    $scope.respuestaUpdate = "Producto actualizado";
                } else {
                    $scope.respuestaUpdate = "Producto no actualizado";
                }
            })
    }

    $scope.eliminarProducto = function(idProductotoDelete) {
        console.log(idProductotoDelete);
        data = {
            ID_producto: idProductotoDelete
        }
        console.log(data);
        $http.get('/FOPFINAL/administrador/eliminarProducto', { params: data })
            .then(function(response) {
                console.log(response.data);
                if (response.data == "Producto borrado correctamente") {
                    $scope.mensajeDelete = "¡Producto borrado correctamente!";
                    $window.location.reload();
                } else {
                    $scope.mensajeDelete = "¡Producto NO borrado!";
                }
            })
    }
})