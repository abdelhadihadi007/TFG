<?php 

    //Clase para los errores al cargar recursos de la aplicacion
    class PageError extends Controller{

        function __construct(){
            parent::__construct();
            $this->view->mensaje = "La página que ha solicitado no se encuentra";
            $this->view->render('error/index');
        }
    }
?>