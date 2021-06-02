<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    
    //Cosntructor inicializacion de la base de datos 
    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
    }

    //Funcion para conectarse a la base de datos
    function connect(){
        try{
            // creando conexion
            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
         }
         catch(Exception $e)
         {
            echo("Conexion fallida: " . mysqli_connect_error() . $e);
         }
         return $conn;
    }
}
?>