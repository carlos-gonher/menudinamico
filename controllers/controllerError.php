<?php

class ControllerError extends Controller{
    
    public function __construct() {
        parent::__construct();
        echo '<H1>Controlador no encontrado</H1>';
    }
}
?>