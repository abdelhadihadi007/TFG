<?php 
    class Registrar extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('registrar/index');
        }

        function IniciarSesion(){
            $correo = $_GET['correoIniciar'];
            $password = $_GET['passwordIniciar'];
            $iniciar = $this->model->iniciarSesion($correo, $password);
        }

        function registrarUsuario(){
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $DNI = $_GET['DNI'];
            $correElec = $_GET['correoElec'];
            $password = $_GET['password'];
            $provincia = $_GET['provincia'];
            $ciudad = $_GET['ciudad'];
            $direccion = $_GET['direccion'];
            $codPostal = $_GET['codPostal'];

            $param=[$nombre, $apellido, $DNI, $correElec, $password, $provincia, $ciudad, $direccion, $codPostal];

            $registrar = $this->model->insertarUsuario($param);
        }
    }





?>