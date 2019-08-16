<?php

class Endereco_PessoaDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Endereco_Pessoa $endereco_pessoa, Pessoa $pessoa) {
        $sql = $this->pdo->prepare('INSERT INTO endereco_pessoa (id_pessoa, rua, numero, bairro, cidade, estado, cep) VALUES (:id_pessoa, :rua, :numero, :bairro, :cidade, :estado, :cep)');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        $sql->bindValue(':rua', $endereco_pessoa->getRua());
        $sql->bindValue(':numero', $endereco_pessoa->getNumero());
        $sql->bindValue(':bairro', $endereco_pessoa->getBairro());
        $sql->bindValue(':cidade', $endereco_pessoa->getCidade());
        $sql->bindValue(':estado', $endereco_pessoa->getEstado());
        $sql->bindValue(':cep', $endereco_pessoa->getCEP());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Endereco_Pessoa $endereco_pessoa, Pessoa $pessoa) {
        $sql = $this->pdo->prepare('update endereco_pessoa set rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep where id_pessoa = :id_pessoa');
        $sql->bindValue(':rua', $endereco_pessoa->getRua());
        $sql->bindValue(':numero', $endereco_pessoa->getNumero());
        $sql->bindValue(':bairro', $endereco_pessoa->getBairro());
        $sql->bindValue(':cidade', $endereco_pessoa->getCidade());
        $sql->bindValue(':estado', $endereco_pessoa->getEstado());
        $sql->bindValue(':cep', $endereco_pessoa->getCEP());
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('delete from endereco_pessoa where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getEndereco($id) {
        $sql = $this->pdo->prepare('select * from endereco_pessoa where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $endereco_pessoa = new Endereco_Pessoa;
                
                $endereco_pessoa->setId($dados->id_endereco);
                $endereco_pessoa->setId_Pessoa($dados->id_pessoa);
                $endereco_pessoa->setRua($dados->rua);
                $endereco_pessoa->setNumero($dados->numero);
                $endereco_pessoa->setBairro($dados->bairro);
                $endereco_pessoa->setCidade($dados->cidade);
                $endereco_pessoa->setEstado($dados->estado);
                $endereco_pessoa->setCEP($dados->cep);

                return $endereco_pessoa;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getEnderecos() {
        $sql = $this->pdo->prepare('select * from endereco_pessoa');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $endereco_pessoa = new Endereco_Pessoa;
                
                $endereco_pessoa->setId($dados->id);
                $endereco_pessoa->setId_Pessoa($dados->id_pessoa);
                $endereco_pessoa->setRua($dados->rua);
                $endereco_pessoa->setNumero($dados->numero);
                $endereco_pessoa->setBairro($dados->bairro);
                $endereco_pessoa->setCidade($dados->cidade);
                $endereco_pessoa->setEstado($dados->estado);
                $endereco_pessoa->setCEP($dados->cep);

                $lista[] = $endereco_pessoa;
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