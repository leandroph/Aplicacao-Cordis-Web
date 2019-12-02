<?php

class PaisDAO {

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
     * @param  mixed $pais
     *
     * @return void
     */
    public function inserir(Pais $pais) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_paises (id, nome, sigla) VALUES (:id, :nome, :sigla)');
        $sql->bindValue(':id', $pais->getId());
        $sql->bindValue(':nome', $pais->getNome());
        $sql->bindValue(':sigla', $pais->getSigla());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    
    // retorna apenas uma pais
    /**
     * getPais
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getPais($id)
    {
        $sql = $this->pdo->prepare('select * from tb_paises where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $cidade = new Cidade();

                $pais->setId($dados->id);
                $pais->setNome($dados->nome);
                $pais->setSigla($dados->sigla);

                return $pais;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    // retorna uma lista de paises
    /**
     * getPaises
     *
     * @return void
     */
    public function getPaises()
    {
        $sql = $this->pdo->prepare('select * from tb_paises');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $pais = new Pais();

                $pais->setId($dados->id);
                $pais->setNome($dados->nome);
                $pais->setSigla($dados->sigla);

                $lista[] = $pais;
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
     * @param  mixed $pais
     *
     * @return void
     */
    public function alterar(Pais $pais)
    {
        $sql = $this->pdo->prepare('update tb_paises set id= :id, nome = :nome, sigla = :sigla');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':nome', $preferencia->getNome());
        $sql->bindValue(':sigla', $preferencia->getSigla());
        
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
     * @param  mixed $pais
     *
     * @return void
     */
    public function excluir(Pais $pais)
    {
        $sql = $this->pdo->prepare('delete from tb_paises where id = :id');
        $sql->bindValue(':id', $pais->getId());
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