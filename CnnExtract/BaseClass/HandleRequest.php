<?php

class HandleRequest {

    function __construct() {
        if(!isset($_GET['path'])) {
            require 'Controller/error.php';
            $controller = new Error();
            $controller->withMsg('Error : Requested Resource Not Found..');
            return;
        }
        
        $path = $_GET['path'];
        $path = rtrim($path, '/');
        $path = explode('/', $path);

        $requestedFile = 'Controller/' . $path[0] . '.php';
        if(file_exists($requestedFile)){
            require $requestedFile;
        }
        else{
            require 'Controller/error.php';
            $controller = new Error();
            $controller->withMsg('Error : Requested Resource '.$requestedFile.' Not Found..');
            return;
        }
        $controller = new $path[0];
        if (isset($path[2])) {
            $controller->{$path[1]}($path[2]);
        } else if (isset($path[1])) {
            $controller->{$path[1]}();
            //$controller->function();
        }
    }

}

?>