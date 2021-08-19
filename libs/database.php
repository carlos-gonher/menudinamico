<?php

class Database {
    
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    private $db_charset;
    
    private $pdo;
    
    public function __construct() {
        
        $this->db_host = constant('DB_HOST');
        $this->db_name = constant('DB_NAME');
        $this->db_user = constant('DB_USER');
        $this->db_password = constant('DB_PASSWORD');
        $this->db_charset = constant('DB_CHARSET');
    }
    
    public function connect() {
        
        try{
            $connection = 'mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset='.$this->db_charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO($connection, $this->db_user, $this->db_password, $options);
            
            return $this->pdo;

        } catch(PDOException $e) {
            print_r('Error connection: '.$e->getMessage());
        }
    }
    
}
?>