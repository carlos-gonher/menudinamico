<?php

class View {
    
    public $data;
    
    public function __construct() {
        $this->data = array();
    }
    
    public function render($controller, $method) {
    
        $file_view = 'views/' . $controller .'/'. $method .'.phtml';
        require_once $file_view;
    }
    
}
?>