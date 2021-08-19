<?php

class Resultado extends Controller{
    
    public function __construct() {
        parent::__construct();
        
        $crudModel = $this->loadModel('crud');
        $this->view->rows = $crudModel->getAllRows();        
        $this->view->render('resultado', 'index');
    }
    
}

?>