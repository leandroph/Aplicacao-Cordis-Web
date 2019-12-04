<?php

class SecretariaDAO {

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
     * Insere registro no banco
     *
     * @param  mixed $secretaria
     *
     * @return void
     */
    public function inserir(Secretaria $secretaria) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_secretarias (id_usuario, cor_agenda, ativo) VALUES (:id_usuario, :cor_agenda, :ativo)');
        $sql->bindValue(':id_usuario', $secretaria->getId_Usuario());
        $sql->bindValue(':cor_agenda', $secretaria->getCor_Agenda());
        $sql->bindValue(':ativo', $secretaria->getAtivo());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }

    // retorna apenas uma secretaria
    /**
     * Seleciona um registro do banco
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getSecretaria($id)
    {
        $sql = $this->pdo->prepare('select * from tb_secretarias where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $secretaria = new Secretaria();

                $secretaria->setId_Usuario($dados->id_usuario);
                $secretaria->setCor_Agenda($dados->cor_agenda);
                $secretaria->setAtivo($dados->ativo);

                return $secretaria;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de secretarias
    /**
     * Seleciona todos registros do banco
     *
     * @return void
     */
    public function getSecretarias()
    {
        $sql = $this->pdo->prepare('select * from tb_secretarias');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $secretaria = new Secretaria();

                $secretaria->setId_Usuario($dados->id_usuario);
                $secretaria->setCor_Agenda($dados->cor_agenda);
                $secretaria->setAtivo($dados->ativo);

                $lista[] = $secretaria;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    /**
     * Altera registro do banco
     *
     * @param  mixed $secretaria
     *
     * @return void
     */
    public function alterar(Secretaria $secretaria)
    {
        $sql = $this->pdo->prepare('update tb_secretarias set id_usuario = :id_usuario, cor_agenda = :cor_agenda, ativo = :ativo');
        $sql->bindValue(':id_usuario', $secretaria->getId_Usuario());
        $sql->bindValue(':cor_agenda', $secretaria->getCor_Agenda());
        $sql->bindValue(':ativo', $secretaria->getAtivo());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }
    
    /**
     * Exclui registro do banco
     *
     * @param  mixed $secretaria
     *
     * @return void
     */
    public function excluir(Secretaria $secretaria)
    {
        $sql = $this->pdo->prepare('delete from tb_secretarias where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $endereco->getId_Usuario());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    }

}
