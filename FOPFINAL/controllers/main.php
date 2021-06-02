<?php

    class Main extends Controller{
        //Nueva clase MAIN ";
        function __construct(){
            parent::__construct();
            //Nuevo controlador MAIN";
        }

        //Funcion para renderizar la vista de main
        function render(){
            $this->view->render('main/index');
        }
        
        function detalleProducto(){
            require_once 'views/main/detalleProducto.php';
        }
    }
?>