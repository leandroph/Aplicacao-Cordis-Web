<?php

class ContatoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Contato $contato) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_contatos (id_usuario, telefone, tipo) VALUES (:id_usuario, :telefone, :tipo)');
        $sql->bindValue(':id_usuario', $contato->getId_usuario());
        $sql->bindValue(':telefone', $contato->getTelefone());
        $sql->bindValue(':tipo', $cidade->getTipo());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    // retorna apenas um contato
    public function getContato($id)
    {
        $sql = $this->pdo->prepare('select * from tb_contatos where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $contato = new Contato();

                $cidade->setId_usuario($dados->id_usuario);
                $cidade->setTelefone($dados->telefone);
                $cidade->setTipo($dados->tipo);

                return $contato;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de contatos
    public function getContatos()
    {
        $sql = $this->pdo->prepare('select * from tb_contatos');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $contato = new Contato();

                $contato->setId_usuario($dados->id_usuario);
                $contato->setTelefone($dados->telefone);
                $contato->setTipo($dados->tipo);

                $lista[] = $contato;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    public function alterar(Contato $contato)
    {
        $sql = $this->pdo->prepare('update tb_contatos set id_usuario = :id_usuario, telefone = :telefone, tipo = :tipo');
        $sql->bindValue(':id_usuario', $preferencia->getId_usuario());
        $sql->bindValue(':telefone', $preferencia->getTelefone());
        $sql->bindValue(':tipo', $preferencia->getTipo());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }
    
    public function excluir(Cidade $cidade)
    {
        $sql = $this->pdo->prepare('delete from tb_contatos where id = :id');
        $sql->bindValue(':id', $contato->getId_usuario());
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