<?php 
    require_once 'controllers/error.php';
    //Esto es el acceso de las URLS 

    class App{

        function __construct(){
            //echo "<p>Mi APP</p>";

            $url = isset($_GET['url']) ? $_GET['url']: null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            
            //Cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }


            $archivoController = 'controllers/' . $url[0] . '.php';
            
            if(file_exists($archivoController)){
                require_once $archivoController;

                //Inicializa el controlador
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                //elementos del arreglo
                $nparam = sizeof($url);

                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }

                //si hay un metodo que se requiere cargar
                /*if(isset($url[1])){
                    $controller->{$url[1]}();
                }else{
                    $controller->render();
                }*/
            }else{
                $controller = new PageError();
            }
        }
    }

?>