<?php

class Inicio extends Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->view->mensaje = 'Este es un mensaje dinamico para Inicio';
        $this->view->render('inicio', 'index');
    }
    
    public function menu() {
        echo '<p>Metodo Menu: </p>';
    }
}

?>