<?php 
    include_once 'models/usuario.php';
    include_once 'models/producto.php';

    class AdministradorModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        
        //Crea usuario como administrador (asi poder poner el rol, en caso de querer tener mas administradores)
        function createUsuarioAdmin($param){

            $dni = $this->sanitize($item[2]);
            $nombre = $this->sanitize($item[0]);
            $apellido = $this->sanitize($item[1]);
            $correoElectronico = $this->sanitize($item[3]);
            $password = $this->sanitize($item[4]);
            $nombreRol = $this->sanitize($item[5]);
            $provincia = $this->sanitize($item[6]);
            $ciudad = $this->sanitize($item[7]);
            $direccion = $this->sanitize($item[8]);
            $codPostal = $this->sanitize($item[9]);

            $sql = "INSERT INTO usuarios(DNI, nombre, apellido, correoElectronico, password, nombreRol, provincia, ciudad, direccion, codPostal) VALUES ('$dni', '$nombre', '$apellido', '$correoElectronico', '$password', '$nombreRol', '$provincia', '$ciudad', '$direccion', '$codPostal')";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Usuario creado con exito";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->db->connect());
            }
            $this->db->connect()->close();
        }


        //Obtiene todos los usuarios
        function getUsuarios(){
            $usuarios = [];

            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($this->db->connect(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                
                //Rocorro el array de todos los usuarios
                while($row = mysqli_fetch_assoc($result)) {
                    $usuario = new Usuario();

                    $usuario->ID_usuario = $this->sanear($row['ID_usuario']);
                    $usuario->DNI = $this->sanear($row['DNI']);
                    $usuario->nombre = $this->sanear($row['nombre']);
                    $usuario->apellido = $this->sanear($row['apellido']);
                    $usuario->correoElectronico = $this->sanear($row['correoElectronico']);
                    $usuario->password = $this->sanear($row['password']);
                    $usuario->nombreRol = $this->sanear($row['nombreRol']);
                    $usuario->bloqueado = $this->sanear($row['bloqueado']);
                    $usuario->provincia = $this->sanear($row['provincia']);
                    $usuario->ciudad = $this->sanear($row['ciudad']);
                    $usuario->direccion = $this->sanear($row['direccion']);
                    $usuario->codPostal = $this->sanear($row['codPostal']);

                    array_push($usuarios, $usuario);
                }
                echo json_encode($usuarios);
            }else{
                return "0 result";
            }
            $this->db->connect()->close();
        }
        

        //Obtiene informacion de un usuario
        function getUsuario($id){
            $usuario = new Usuario();
            $sql = "SELECT * FROM usuarios WHERE ID_usuario = '$id'";
            $result = mysqli_query($this->db->connect(), $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = $this->sanear(mysqli_fetch_assoc($result));
                echo json_encode($row);
                return ($row);
            }else{
                return "0 result";
            }
            $this->db->connect()->close();
        }

        //Modifica usuario
        function updateUsuario($item){
            $ID_usuario = $this->sanitize($item[0]);
            $dni = $this->sanitize($item[3]);
            $nombre = $this->sanitize($item[1]);
            $apellido = $this->sanitize($item[2]);
            $correoElectronico = $this->sanitize($item[4]);
            $password = $this->sanitize($item[5]);
            $nombreRol = $this->sanitize($item[6]);
            $bloqueado = $this->sanitize($item[7]);
            $provincia = $this->sanitize($item[8]);
            $ciudad = $this->sanitize($item[9]);
            $direccion = $this->sanitize($item[10]);
            $codPostal = $this->sanitize($item[11]);

            $sql = "UPDATE usuarios SET DNI='$dni', nombre='$nombre', apellido='$apellido', correoElectronico='$correoElectronico', password='$password', nombreRol='$nombreRol', bloqueado='$bloqueado', provincia='$provincia', ciudad='$ciudad', direccion='$direccion', codPostal='$codPostal' WHERE ID_usuario = '$ID_usuario'";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Usuario actualizado correctamente";
            } else {
                echo "Error al actualizar el usuario: " . mysqli_error($this->db->connect());
            }
        }


        //Elimina Usuario
        function deleteUsuario($id){
            $ID_usuario = $id;
            // sql para borrar un usuario
            $sql = "DELETE FROM usuarios WHERE ID_usuario = '$ID_usuario'";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Usuario borrado correctamente";
            } else {
                echo "Error al borrar usuario: " . $this->db->connect()->error;
            }

            $this->db->connect()->close();
        }

        //Obtiene todos los productos
        function getProductos(){
            $productos = [];

            $sql = "SELECT * FROM productos";
            $result = mysqli_query($this->db->connect(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                
                //Rocorro el array de todos los producto
                while($row = mysqli_fetch_assoc($result)) {
                    $producto = new Producto();

                    $producto->ID_producto = $this->sanear($row['ID_producto']);
                    $producto->nombre = $this->sanear($row['nombre']);
                    $producto->descripcion = $this->sanear($row['descripcion']);
                    $producto->imagen = $this->sanear($row['imagen']);
                    $producto->marca = $this->sanear($row['marca']);
                    $producto->categoria = $this->sanear($row['categoria']);
                    $producto->precio = $this->sanear($row['precio']);
                    $producto->stock = $this->sanear($row['stock']);
                    $producto->numeroDeVentas = $this->sanear($row['numeroDeVentas']);
                    $producto->fecha_publicacion = $this->sanear($row['fecha_publicacion']);
                    $producto->ID_mascota = $this->sanear($row['ID_mascota']);

                    array_push($productos, $producto);
                }
                echo json_encode($productos);
            }else{
                return "0 result";
            }
            $this->db->connect()->close();
        }

        //Obtiene informacion de un producto
        function getProducto($id){
            $producto = new Producto();

            $sql = "SELECT * FROM productos WHERE ID_producto = '$id'";
            $result = mysqli_query($this->db->connect(), $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = $this->sanear(mysqli_fetch_assoc($result));
                echo json_encode($row);
                return ($row);
            }else{
                return "0 result";
            }
            $this->db->connect()->close();
        }

        //Agrega un producto
        function insertarproducto($param){
            $nombre = $this->sanitize($param[0]);
            $descripcion = $this->sanitize($param[1]);
            $marca = $this->sanitize($param[2]);
            $categoria = $this->sanitize($param[3]);
            $precio = $this->sanitize($param[4]);
            $stock = $this->sanitize($param[5]);
            $ID_mascota =  $this->sanitize($param[6]);
            $imagen =  $this->sanitize($param[7]);

            $sql = "INSERT INTO usuarios(nombre, descripcion, marca, categoria, precio, stock, ID_mascota, imagen) VALUES ('$nombre', '$descripcion', '$marca', '$categoria', '$precio', '$stock', '$ID_mascota', '$imagen')";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Usuario creado con exito";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->db->connect());
            }
            $this->db->connect()->close();
        }

        //Actualiza un producto
        function updateProducto($item){
            $ID_producto = $this->sanitize($item[0]);
            $nombre = $this->sanitize($item[1]);
            $descripcion = $this->sanitize($item[2]);
            $marca = $this->sanitize($item[3]);
            $categoria = $this->sanitize($item[4]);
            $precio = $this->sanitize($item[5]);
            $stock = $this->sanitize($item[6]);
            $fecha_publicacion = $this->sanitize($item[7]);
            $imagen = $this->sanitize($item[8]);
            $numeroDeVentas = $this->sanitize($item[9]);

            $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', marca='$marca', categoria='$categoria', precio='$precio', stock='$stock', numeroDeVentas='$numeroDeVentas', imagen='$imagen', fecha_publicacion='$fecha_publicacion' WHERE ID_producto = '$ID_producto'";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Producto actualizado correctamente";
            } else {
                echo "Error al actualizar el producto: " . mysqli_error($this->db->connect());
            }
        }


        //Elimina Usuario
        function deleteProducto($id){
            $ID_producto = $id;
            // sql para borrar un usuario
            $sql = "DELETE FROM productos WHERE ID_producto = '$ID_producto'";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Producto borrado correctamente";
            } else {
                echo "Error al borrar producto: " . $this->db->connect()->error;
            }

            $this->db->connect()->close();
        }

    }
?>