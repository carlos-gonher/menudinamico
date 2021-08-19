<?php

class Eliminar extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function elemento() {
        
        $view = $this->getView();
        
        $get = explode("/", $_GET['url']);
        $id = end($get);

        $crudModel = $this->loadModel('crud'); 
        $this->view->row = $crudModel->getRow($id);
        $this->view->render('eliminar', 'elemento');
    }
    
    public function borrar() {
        
        echo 'class Eliminar - function borrar: <br>';
        var_dump($_POST); 
        
        $post_data = array();
        $post_data['menu_id'] = $this->clean_input($_POST['menu_id']);

        $crudModel = $this->loadModel('crud');
        $crudModel->delete($post_data);
        
    }
    
    public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}

?>