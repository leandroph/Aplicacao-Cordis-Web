<?php

class ConvenioDAO {

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
    public function inserir(Convenio $convenio) {
        $sql = $this->pdo->prepare('INSERT INTO tb_convenios (id, nome, ativo, nomeEmpresa, cnpjEmpresa) VALUES (:id, :nome, :ativo, :nomeEmpresa, :cnpjEmpresa)');
        $sql->bindValues(':id', $convenio->getId());
        $sql->bindValues(':nome', $agendamento->getNome());
        $sql->bindValues(':ativo', $agendamento->getAtivo());
        $sql->bindValues(':nomeEmpresa', $agendamento->getNomeEmpresa());
        $sql->bindValues(':cnpjEmpresa', $agendamento->getCnpjEmpresa());
        if($sql->execute()) {
            return true;
        } else {
            echo $sql->errorCode();
        }
    }
    
    /**
     * read
     *
     * @return void
     */
    public function getConvenio($id)
    {
        $sql = $this->pdo->prepare('select * from tb_convenios where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $convenio = new Convenio();

                $convenio->setId($dados->id);
                $convenio->setNome($dados->nome);
                $convenio->setAtivo($dados->ativo);
                $convenio->setNomeEmpresa($dados->nomeEmpresa);
                $convenio->setCnpjEmpresa($dados->cnpjEmpresa);

                return $convenio;
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
    public function getConvenios()
    {
        $sql = $this->pdo->prepare('select * from tb_convenios');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $convenio = new Convenio();

                $convenio->setId($dados->id);
                $convenio->setNome($dados->nome);
                $convenio->setAtivo($dados->ativo);
                $convenio->setNomeEmpresa($dados->nomeEmpresa);
                $convenio->setCnpjEmpresa($dados->cnpjEmpresa);

                $lista[] = $convenio;
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
    public function alterar(Convenio $convenio)    {
        $sql = $this->pdo->prepare('update tb_convenios set id= :id, nome = :nome, ativo = :ativo, nomeEmpresa = :nomeEmpresa, cnpjEmpresa = :cnpjEmpresa');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':nome', $preferencia->getNome());
        $sql->bindValue(':ativo', $preferencia->getAtivo());
        $sql->bindValue(':nomeEmpresa', $preferencia->getNomeEmpresa());
        $sql->bindValue(':cnpjEmpresa', $preferencia->getCnpjEmpresa());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }

    public function excluir(Convenio $convenio)
    {
        $sql = $this->pdo->prepare('delete from tb_convenios where id = :id');
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