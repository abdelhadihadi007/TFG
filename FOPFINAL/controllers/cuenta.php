<?php 
    //lO QUE ES MOSTRAR EL INDEX DE LA CUENTA 
    class Cuenta extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('cuenta/index');
        }

    }

?>