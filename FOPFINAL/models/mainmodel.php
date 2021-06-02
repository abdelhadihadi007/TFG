<?php 

    //Clase para los errores al cargar recursos de la aplicacion
    class MainModel extends Controller{

        function __construct(){
            parent::__construct();
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
    }
?>

