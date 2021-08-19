<?php

class Model{
  
    private $db;
    
    public function __construct() {
        
        $this->db = new Database();
    }
    
    public function getDb() {
        return $this->db;
    }
    
    public function insertRow($data) {
        
        $pdo = $this->db->connect();
        $sql = "INSERT INTO menu (id_padre, menu_nombre, menu_description) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $result = $stmt->execute([$data['id_padre'], $data['menu_nombre'], $data['menu_description']]);
        
        if($result){
            header('Location: '.BASE_URL.'/listado');
        } else {
            echo '<h1>Error al crear el registro</h1>';
        }
    }
    
    public function updateRow($data) {
        
        $pdo = $this->db->connect();
        $sql = "UPDATE menu SET id_padre=?, menu_nombre=?, menu_description=? WHERE menu_id=?";
        $stmt= $pdo->prepare($sql);
        $result = $stmt->execute([$data['id_padre'], $data['menu_nombre'], $data['menu_description'], $data['menu_id']]);
        
        if($result){
            header('Location: '.BASE_URL.'/listado');
        } else {
            echo '<h1>Error al crear el registro</h1>';
        }
    }
    
    public function deleteRow($data) {
        
        $pdo = $this->db->connect();
        $step = $pdo->prepare("DELETE FROM menu WHERE menu_id=:id");
        $step->bindParam(":id",$data['menu_id'],PDO::PARAM_INT);
        $result = $step->execute();
        
        if($result){
            header('Location: '.BASE_URL.'/listado');
        } else {
            echo '<h1>Error al crear el registro</h1>';
        }
    }
    
    public function selectAll() {
        
        $pdo = $this->db->connect();
        $sth = $pdo->query('SELECT * FROM menu ORDER BY id_padre ASC');
        $rows = $sth->fetchAll();
        return $rows;
    }
    
    public function selectRow($id) {
        $pdo = $this->db->connect();
        $stmt = $pdo->prepare("SELECT * FROM menu WHERE menu_id=? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>