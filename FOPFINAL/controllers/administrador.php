<?php 
    class Administrador extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('administrador/index');
        }

        function crearUsuarioAdmin(){
            $this->view->render('administrador/crearUsuario');
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $DNI = $_GET['DNI'];
            $correElec = $_GET['correoElec'];
            $password = $_GET['password'];
            $provincia = $_GET['provincia'];
            $nombreRol = $_GET['nombreRolAdmin'];
            $ciudad = $_GET['ciudad'];
            $direccion = $_GET['direccion'];
            $codPostal = $_GET['codPostal'];

            $param=[$nombre, $apellido, $DNI, $correElec, $password, $nombreRol, $provincia, $ciudad, $direccion, $codPostal];

            $registrar = $this->model->createUsuarioAdmin($param);
        }

        function mostrarUsuarios(){
            $mostrarTodo = $this->model->getUsuarios();
            $this->view->usuarios = $mostrarTodo;
        }

        function mostrar() {
            $id = $_GET['id'];
            $this->model->getUsuario($id);
        } 


        function mostrarUsuario(){
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            require_once 'views/administrador/detalleUsuario.php';
        }

        function registrar(){
            $ID_usuario = $_GET['ID_usuario'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $DNI = $_GET['DNI'];
            $correoElectronico = $_GET['correoElectronico'];
            $password = $_GET['password'];
            $nombreRol = $_GET['nombreRol'];
            $bloqueado = $_GET['bloqueado'];
            $provincia = $_GET['provincia'];
            $ciudad = $_GET['ciudad'];
            $direccion = $_GET['direccion'];
            $codPostal = $_GET['codPostal'];

            $param=[$ID_usuario, $nombre, $apellido, $DNI, $correoElectronico, $password, $nombreRol,$bloqueado, $provincia, $ciudad, $direccion, $codPostal];
            $registrar = $this->model->updateUsuario($param);
        }

        function editarUsuario(){
            require_once 'views/administrador/editarUsuario.php';
        }

        function eliminarUsuario(){
            $ID_usuario = $_GET['ID_usuario'];
            $eliminar = $this->model->deleteUsuario($ID_usuario);
        }

        
        
        function agregarprodu(){
            $nombre = $_GET['nombre'];
            $descripcion = $_GET['descripcion'];
            $marca = $_GET['marca'];
            $categoria = $_GET['categoria'];
            $precio = $_GET['precio'];
            $stock = $_GET['stock'];
            $ID_mascota = $_GET['ID_mascota'];
            $imagen = $_GET['imagen'];

            $param=[$nombre, $descripcion, $marca, $categoria, $precio, $stock, $ID_mascota, $imagen];

            $agregarPro = $this->model->insertarproducto($param);
        }
        function agregarProducto(){
            $this->view->render('administrador/crearProducto');
        }

        function mostrarProductos(){
            $mostrarTodo = $this->model->getProductos();
            $this->view->productos = $mostrarTodo;
        }

        function mostrarPro() {
            $id = $_GET['id'];
            $this->model->getProducto($id);
        } 


        function mostrarProducto(){
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            require_once 'views/administrador/detalleProducto.php';
        }

        function actualizarProducto(){
            $ID_producto = $_GET['ID_producto'];
            $nombre = $_GET['nombre'];
            $descripcion = $_GET['descripcion'];
            $marca = $_GET['marca'];
            $categoria = $_GET['categoria'];
            $precio = $_GET['precio'];
            $stock=$_GET['stock'];
            $fecha_publicacion= $_GET['fecha_publicacion'];
            $imagen= $_GET['imagen'];
            $numeroDeVentas= $_GET['numeroDeVentas'];

            $param=[$ID_producto, $nombre, $descripcion, $marca, $categoria, $precio, $stock,$fecha_publicacion, $imagen, $numeroDeVentas];
            $registrar = $this->model->updateProducto($param);
        }

        function editarProducto(){
            require_once 'views/administrador/editarProducto.php';
        }

        function eliminarProducto(){
            $ID_producto = $_GET['ID_producto'];
            $eliminar = $this->model->deleteProducto($ID_producto);
        }

    }
?>