<?php

class GrupoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Grupo $grupo) {
        $sql = $this->pdo->prepare('INSERT INTO usuarios_grupo (id_grupo, descricao) VALUES (:id_grupo, :descricao)');
        $sql->bindValue(':id_grupo', $grupo->getId());
        $sql->bindValue(':descricao', $grupo->getDescricao());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Grupo $grupo) {
        $sql = $this->pdo->prepare('update grupo descricao = :descricao where id_grupo = :id_grupo');
        $sql->bindValue(':descricao', $grupo->getDescricao());
        $sql->bindValue(':id_grupo', $grupo->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Grupo $grupo) {
        $sql = $this->pdo->prepare('delete from grupo where id_grupo = :id_grupo');
        $sql->bindValue(':id_grupo', $grupo->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getGrupo($id) {
        $sql = $this->pdo->prepare('select * from grupo where id_grupo = :id_grupo');
        $sql->bindValue(':id_grupo', $id);
        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $grupo = new Grupo;
                
                $grupo->setDescricao($dados->descricao);

                return $grupo;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getGrupos() {
        $sql = $this->pdo->prepare('select * from grupo');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $grupo = new Grupo;
                
                $grupo->setDescricao($dados->descricao);

                $lista[] = $grupo;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }

}

?>