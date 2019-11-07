<?php

class ProntuarioDAO {

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
    public function inserir(Prontuario $prontuario) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_prontuarios (id, nome, ativo) VALUES (:id, :nome, :ativo)');
        $sql->bindValue(':id', $prontuario->getId());
        $sql->bindValue(':nome', $prontuario->getNome());
        $sql->bindValue(':ativo', $prontuario->getAtivo());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    /**
     * read
     *
     * @return void
     */
    public function getProntuario($id)
    {
        $sql = $this->pdo->prepare('select * from tb_prontuarios where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $prontuario = new Prontuario();

                $prontuario->setId($dados->id);
                $prontuario->setNome($dados->nome);
                $prontuario->setAtivo($dados->ativo);

                return $prontuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function getProntuarios()
    {
        $sql = $this->pdo->prepare('select * from tb_prontuarios');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $prontuario = new Prontuarios();

                $prontuario->setId($dados->id);
                $prontuario->setNome($dados->nome);
                $prontuario->setAtivo($dados->ativo);

                $lista[] = $prontuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }
    
    /**
     * delete
     *
     * @return void
     */
    public function alterar(Prontuario $prontuario)
    {
        $sql = $this->pdo->prepare('update tb_prontuarios set id= :id, nome = :nome, ativo = :ativo');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':nome', $preferencia->getNome());
        $sql->bindValue(':ativo', $preferencia->getAtivo());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }

}
