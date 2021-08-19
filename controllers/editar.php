<?php

class Editar extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function edicion() {

        $get = explode("/", $_GET['url']);
        $id = end($get);

        $crudModel = $this->loadModel('crud'); 
        $this->view->row = $crudModel->getRow($id);
        $this->view->categories = $crudModel->getAllRows();
        $this->view->render('editar', 'edicion');
    }
    
    public function guardar() {

        $post_data = array();
        $post_data['menu_id'] = $this->clean_input($_POST['menu_id']);
        $post_data['id_padre'] = $this->clean_input($_POST['id_padre']);
        $post_data['menu_nombre'] = $this->clean_input($_POST['menu_nombre']);
        $post_data['menu_description'] = $this->clean_input($_POST['menu_description']);
        
        $crudModel = $this->loadModel('crud');
        $crudModel->update($post_data);
        
    }
    
    public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
}

?>