<?php

class CrudModel extends Model{    
    
    private $pdo;

    public function __construct() {
        parent::__construct();
        
        $this->pdo = $this->getDb();
    }
    
    public function create($post_data) {
        $this->insertRow($post_data);
    }
    
    public function update($post_data) {
        $this->updateRow($post_data);
    }
    
    public function delete($post_data) {
        $this->deleteRow($post_data);
    }
    public function getAllRows() {
        return $this->selectAll();
    }
    
    public function getRow($id) {
        return $this->selectRow($id);
    }
    
}
?>