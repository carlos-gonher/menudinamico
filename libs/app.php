<?php

class App {
    
    private $_controllerError = 'controllers/controllerError.php';
    
    public function __construct() {
        
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        $controllerFile = 'controllers/' . $url[0] . '.php';
        
        if(file_exists($controllerFile)){
            
            require_once $controllerFile;
            $controllerObject = new $url[0];
            
            if(isset($url[1])){
                $controllerObject->{$url[1]}();
            }
        } else {
            require_once $this->_controllerError;
            $controller = new ControllerError();
        }
    }
}
?>