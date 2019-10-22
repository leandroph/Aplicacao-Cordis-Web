<?php

class EstadoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Estado $estado) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_estados (id, nome, uf, id_pais) VALUES (:id, :nome, :uf, :id_pais)');
        $sql->bindValue(':id', $pais->getId());
        $sql->bindValue(':nome', $pais->getNome());
        $sql->bindValue(':sigla', $pais->getUf());
        $sql->bindValue(':id_pais', $pais->getId_Pais());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }
    
    // retorna apenas uma estado
    public function getEstado($id)
    {
        $sql = $this->pdo->prepare('select * from tb_estados where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $estado = new Estado();

                $estado->setId($dados->id);
                $estado->setNome($dados->nome);
                $estado->setUF($dados->uf);
                $estado->setId_Pais($dados->id_pais);

                return $estado;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    // retorna uma lista de estados
    public function getEstado()
    {
        $sql = $this->pdo->prepare('select * from tb_estados');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $estado = new Estado();

                $estado->setId($dados->id);
                $estado->setNome($dados->nome);
                $estado->setUf($dados->uf);
                $estado->setId_Pais($dados->id_pais);


                $lista[] = $estado;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    public function alterar(Estado $estado)
    {
        $sql = $this->pdo->prepare('update tb_estados set id= :id, nome = :nome, uf = :uf, id_pais = :id_pais');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':nome', $preferencia->getNome());
        $sql->bindValue(':uf', $preferencia->getUf());
        $sql->bindValue(':id_pais', $preferencia->getId_Pais());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }
    
    public function excluir(Estado $ estado)
    {
        $sql = $this->pdo->prepare('delete from tb_estados where id = :id');
        $sql->bindValue(':id', $estado->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

}

?>