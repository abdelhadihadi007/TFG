<?php 
    class View{

        function __construct(){
            //Esto es uan vista BASE para todas las vistas de la aplicacion";
        }

        //Funcion para renderizar todas las vistas
        function render($nombre){
            require 'views/' . $nombre . '.php';
        }
    }
?>