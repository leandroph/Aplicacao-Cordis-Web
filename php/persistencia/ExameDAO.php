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
     * Insere registro no banco
     *
     * @return void
     */
    public function inserir(Exame $exame)
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_exames (id, nome, valor, especial, ativo) VALUES (:id, :nome, :valor, :especial, :ativo)');
        $sql->bindValue(':id', $exame->getId());
        $sql->bindValue(':nome', $exame->getNome());
        $sql->bindValue(':valor', $exame->getValor());
        $sql->bindValue(':especial', $exame->getEspecial());
        $sql->bindValue(':ativo', $exame->getAtivo());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    // retorna apenas uma exame
    /**
     * Seleciona um registro do banco
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getExame($id)
    {
        $sql = $this->pdo->prepare('select * from tb_exames where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $exame = new Exame();

                $exame->setId($dados->id);
                $exame->setNome($dados->nome);
                $exame->setValor($dados->valor);
                $exame->setEspecial($dados->especial);
                $exame->setAtivo($dados->ativo);

                return $exame;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    // retorna uma lista de exames
    /**
     * Seleciona todos registros do banco
     *
     * @return void
     */
    public function getExames()
    {
        $sql = $this->pdo->prepare('select * from tb_exames');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $exame = new Exame();

                $exame->setId($dados->id);
                $exame->setNome($dados->nome);
                $exame->setValor($dados->valor);
                $exame->setEspecial($dados->especial);
                $exame->setAtivo($dados->ativo);


                $lista[] = $exame;
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
     * @return void
     */
    public function alterar(Exame $exame)
    {
        $sql = $this->pdo->prepare('update tb_exames set id= :id, nome = :nome, valor= :valor, especial = :especial, ativo = :ativo');
        $sql->bindValue(':id', $exame->getId());
        $sql->bindValue(':nome', $exame->getNome());
        $sql->bindValue(':valor', $exame->getValor());
        $sql->bindValue(':especial', $exame->getEspecial());
        $sql->bindValue(':ativo', $exame->getAtivo());
        
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
     * @return void
     */
    public function excluir(Exame $exame)
    {
        $sql = $this->pdo->prepare('delete from tb_exames where id = :id');
        $sql->bindValue(':id', $exame->getId());
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