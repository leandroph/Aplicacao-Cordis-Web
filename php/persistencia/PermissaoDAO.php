<?php

class PermissaoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function create() {
    
    }
    public function read(){

    }

    public function update(){

    }
    
    public function delete(){

    }

}

?>