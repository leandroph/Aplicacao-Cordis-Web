<?php

class ExameDAO {

    private $pdo;

    /**
     * __construct
     *
     * @param  mixed $pdo
     *
     * @return void
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * create
     *
     * @return void
     */
    public function create() {
    
    }
    
    /**
     * read
     *
     * @return void
     */
    public function read(){

    }

    /**
     * update
     *
     * @return void
     */
    public function update(){

    }
    
    /**
     * delete
     *
     * @return void
     */
    public function delete(){

    }

}

?>