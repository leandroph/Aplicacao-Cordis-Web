<?php

class Tipo_ProdutoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Tipo_Produto $tipo_produto) {
        $sql = $this->pdo->prepare('INSERT INTO tipo_produto (descricao) VALUES (:descricao)');
        $sql->bindValue(':descricao', $tipo_produto->getDescricao());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Tipo_Produto $tipo_produto) {
        $sql = $this->pdo->prepare('update tipo_produto descricao = :descricao where id_tipo_produto = :id_tipo_produto');
        $sql->bindValue(':descricao', $tipo_produto->getDescricao());
        $sql->bindValue(':id_tipo_produto', $tipo_produto->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Tipo_Produto $tipo_produto) {
        $sql = $this->pdo->prepare('delete from tipo_produto where id_tipo_produto = :id_tipo_produto');
        $sql->bindValue(':id_tipo_produto', $tipo_produto->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getTipo_Produto($id) {
        $sql = $this->pdo->prepare('select * from tipo_produto where id_tipo_produto = :id_tipo_produto');
        $sql->bindValue(':id_tipo_produto', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $tipo_produto = new Tipo_Produto;
                
                $tipo_produto->setId($dados->id_tipo_produto);
                $tipo_produto->setDescricao($dados->descricao);

                return $tipo_produto;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getTipo_Produtos() {
        $sql = $this->pdo->prepare('select * from tipo_produto');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $tipo_produto = new Tipo_Produto;
                
                $tipo_produto->setId($dados->id_tipo_produto);
                $tipo_produto->setDescricao($dados->descricao);

                $lista[] = $tipo_produto;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }

}
