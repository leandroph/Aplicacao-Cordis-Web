<?php

class CidadeDAO {

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
     * inserir
     *
     * @param  mixed $cidade
     *
     * @return void
     */
    public function inserir(Cidade $cidade) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_cidades (id, nome, id_estado) VALUES (:id, :nome, :id_estado)');
        $sql->bindValue(':id', $cidade->getId());
        $sql->bindValue(':nome', $cidade->getNome());
        $sql->bindValue(':id_estado', $cidade->getId_Estado());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
   
    // retorna apenas uma cidade
    /**
     * getCidade
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getCidade($id)
    {
        $sql = $this->pdo->prepare('select * from tb_cidades where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $cidade = new Cidade();

                $cidade->setId($dados->id);
                $cidade->setNome($dados->nome);
                $cidade->setId_Estado($dados->id_estado);

                return $cidade;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de cidades
    /**
     * getCidades
     *
     * @return void
     */
    public function getCidades()
    {
        $sql = $this->pdo->prepare('select * from tb_cidades');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $cidade = new Cidade();

                $cidade->setId($dados->id);
                $cidade->setNome($dados->nome);
                $cidade->setId_Estado($dados->id_estado);

                $lista[] = $cidade;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    /**
     * alterar
     *
     * @param  mixed $cidade
     *
     * @return void
     */
    public function alterar(Cidade $cidade)
    {
        $sql = $this->pdo->prepare('update tb_cidades set id= :id, nome = :nome, id_estado = :id_estado');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':nome', $preferencia->getNome());
        $sql->bindValue(':id_estado', $preferencia->getId_Estado());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }
    
    /**
     * excluir
     *
     * @param  mixed $cidade
     *
     * @return void
     */
    public function excluir(Cidade $cidade)
    {
        $sql = $this->pdo->prepare('delete from tb_cidades where id = :id');
        $sql->bindValue(':id', $cidade->getId());
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