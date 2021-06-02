<?php 

    class Sitemap extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('sitemap/index');
        }
    }
?>