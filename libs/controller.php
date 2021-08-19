<?php

class Controller {
    
    public $view;
    
    public function __construct() {
        $this->view = new View();
    }
    
    public function getView() {
        return $this->view;
    }
    
    public function loadModel($model) {
        
        $path = 'models/'.$model.'Model.php';
        
        if(file_exists($path)){

            require_once $path;
            $modelName = $model.'Model';
            return new $modelName();
        }
    }
}
?>