<?php 

    //Clase base para todos los modelos de la aplicacion
    class Model{

        //Constructor del modelo para inicializar la base de datos en todos los modelos
        function __construct(){
            $this->db = new Database();
        }

        // Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de la base de datos
        function sanitize($str){ 
            $str=str_replace("&","&amp;",$str);
            $str=str_replace("\"","&quot;",$str);
            $str=str_replace("'","&apos;",$str);
            $str=str_replace(">","&gt;",$str);
            $str=str_replace("<","&lt;",$str);
            $str=str_replace("€","&lt;",$str);
            return $str;
        }

        //Se utiliza al recuperar datos, sustituir los caracteres especiales por su representacion grafica
        function sanear($str){
            $str=str_replace("&amp;", "&", $str);
            $str=str_replace("&quot;","\"",$str);
            $str=str_replace("&apos;","'",$str);
            $str=str_replace("&gt;", ">",$str);
            $str=str_replace("&lt;", "<",$str);
            $str=str_replace("&lt;","€",$str);
            return $str;
        }
    }

?>