<?php

class Connection {
    private $host   = 'localhost';
    private $dbname = 'applistatarefa';
    private $user   = 'root';
    private $pass   = '';
    
    public function conn() {
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conn;
            
        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
}