<?php 
    include_once 'models/usuario.php';

    class RegistrarModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        function iniciarSesion($correo, $password){
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($this->db->connect(), $sql);

            if (mysqli_num_rows($result) > 0) {
                //Rocorro el array de todos los usuarios
                while($row = mysqli_fetch_assoc($result)) {
                    if($this->sanear($row["correoElectronico"])==$correo){
                        if($row["password"] == $password){
                            session_start();
                            $_SESSION['rol'] = $row['nombreRol'];
                            echo "OK";
                        }else{
                            echo "Contraseña incorrecta";
                        } 
                    }
                }
            }else{
                echo "0 result";
            }
            $this->db->connect()->close();
        }

         

        function insertarUsuario($param){
            $dni = $this->sanitize($param[2]);
            $nombre = $this->sanitize($param[0]);
            $apellido = $this->sanitize($param[1]);
            $correoElectronico = $this->sanitize($param[3]);
            $password = $this->sanitize($param[4]);
            $provincia = $this->sanitize($param[5]);
            $ciudad =  $this->sanitize($param[6]);
            $direccion =  $this->sanitize($param[7]);
            $codPostal =  $this->sanitize($param[8]);

            $sql = "INSERT INTO usuarios(DNI, nombre, apellido, correoElectronico, password, provincia, ciudad, direccion, codPostal) VALUES ('$dni', '$nombre', '$apellido', '$correoElectronico', '$password', '$provincia', '$ciudad', '$direccion', '$codPostal')";

            if (mysqli_query($this->db->connect(), $sql)) {
                echo "Usuario creado con exito";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->db->connect());
            }
            $this->db->connect()->close();
        }
    }

?>