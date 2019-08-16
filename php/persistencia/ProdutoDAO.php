<?php

class ProdutoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Produto $produto) {
        $sql = $this->pdo->prepare('INSERT INTO produto (id_tipo_produto, descricao, modelo, marca, valor, driver) VALUES (:id_tipo_produto, :descricao, :modelo, :marca, :valor, :driver)');
        $sql->bindValue(':id_tipo_produto', $produto->getId_Tipo_Produto());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':modelo', $produto->getModelo());
        $sql->bindValue(':marca', $produto->getMarca());
        $sql->bindValue(':valor', $produto->getValor());
        $sql->bindValue(':driver', $produto->getDriver());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Produto $produto) {
        $sql = $this->pdo->prepare('update produto set id_tipo_produto = :id_tipo_produto, descricao = :descricao, modelo = :modelo, marca = :marca, valor = :valor, driver = :driver where id_produto = :id_produto');
        $sql->bindValue(':id_tipo_produto', $produto->getId_Tipo_Produto());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':modelo', $produto->getModelo());
        $sql->bindValue(':marca', $produto->getMarca());
        $sql->bindValue(':valor', $produto->getValor());
        $sql->bindValue(':driver', $produto->getDriver());
        $sql->bindValue(':id_produto', $produto->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Produto $produto) {
        $sql = $this->pdo->prepare('delete from produto where id_produto = :id_produto');
        $sql->bindValue(':id_produto', $produto->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getProduto($id) {
        $sql = $this->pdo->prepare('select * from produto where id_produto = :id_produto');
        $sql->bindValue(':id_produto', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $produto = new Produto;
                
                $produto->setId($dados->id_produto);
                $produto->setId_Tipo_Produto($dados->id_tipo_produto);
                $produto->setDescricao($dados->descricao);
                $produto->setModelo($dados->modelo);
                $produto->setMarca($dados->marca);
                $produto->setValor($dados->valor);
                $produto->setDriver($dados->driver);

                return $produto;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getProdutos() {
        $sql = $this->pdo->prepare('select * from produto');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $produto = new Produto;
                
                $produto->setId($dados->id_produto);
                $produto->setId_Tipo_Produto($dados->id_tipo_produto);
                $produto->setDescricao($dados->descricao);
                $produto->setModelo($dados->modelo);
                $produto->setMarca($dados->marca);
                $produto->setValor($dados->valor);
                $produto->setDriver($dados->driver);

                $lista[] = $produto;
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