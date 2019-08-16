<?php

class PessoaDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('INSERT INTO pessoa (primeiro_nome, ultimo_nome, email) VALUES (:primeiro_nome, :ultimo_nome, :email)');
        $sql->bindValue(':primeiro_nome', $pessoa->getPrimeiro_Nome());
        $sql->bindValue(':ultimo_nome', $pessoa->getUltimo_Nome());
        $sql->bindValue(':email', $pessoa->getEmail());
        if ($sql->execute()) {
            $pessoa->setId($this->pdo->lastInsertId());
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            $pessoa->setId($this->pdo->lastInsertId());
            echo $sql->errorCode();
        }
    }

    public function alterar(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('update pessoa set primeiro_nome = :primeiro_nome, ultimo_nome = :ultimo_nome, email = :email where id_pessoa = :id_pessoa');
        $sql->bindValue(':primeiro_nome', $pessoa->getPrimeiro_Nome());
        $sql->bindValue(':ultimo_nome', $pessoa->getUltimo_Nome());
        $sql->bindValue(':email', $pessoa->getEmail());
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
        $sql = $this->pdo->prepare('delete from pessoa where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getPessoa($id) {
        $sql = $this->pdo->prepare('select * from pessoa where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $pessoa = new Pessoa;
                
                $pessoa->setId($dados->id_pessoa);
                $pessoa->setPrimeiro_Nome($dados->primeiro_nome);
                $pessoa->setUltimo_Nome($dados->ultimo_nome);
                $pessoa->setEmail($dados->email);

                return $pessoa;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getPessoas() {
        $sql = $this->pdo->prepare('select * from pessoa');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $pessoa = new Pessoa;
                
                $pessoa->setId($dados->id_pessoa);
                $pessoa->setPrimeiro_Nome($dados->primeiro_nome);
                $pessoa->setUltimo_Nome($dados->ultimo_nome);
                $pessoa->setEmail($dados->email);

                $lista[] = $pessoa;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }

}
