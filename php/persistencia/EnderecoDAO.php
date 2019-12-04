<?php

class EnderecoDAO {

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
     * @param  mixed $endereco
     *
     * @return void
     */
    public function inserir(Endereco $endereco) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_enderecos (id, logradouro, bairro, numero, cep, complemento, id_cidade) VALUES (:id, :logradouro, :bairro, :numero, :cep, :complemento, :id_cidade)');
        $sql->bindValue(':id', $endereco->getId());
        $sql->bindValue(':logradouro', $endereco->getLogradouro());
        $sql->bindValue(':bairro', $endereco->getBairro());
        $sql->bindValue(':numero', $endereco->getNumero());
        $sql->bindValue(':cep', $endereco->getCep());
        $sql->bindValue(':complemento', $endereco->getComplemento());
        $sql->bindValue(':id_cidade', $endereco->getId_cidade());
        if ($sql->execute()) {
            $endereco->setId($this->pdo->lastInsertId());
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        } 
    }
    // $id;
	
    // retorna apenas um endereço
    /**
     * getEndereco
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getEndereco($id)
    {
        $sql = $this->pdo->prepare('select * from tb_enderecos where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $endereco = new Endereco();

                $endereco->setId($dados->id);
                $endereco->setLogradouro($dados->logradouro);
                $endereco->setBairro($dados->bairro);
                $endereco->setNumero($dados->numero);
                $endereco->setCep($dados->cep);
                $endereco->setComplemento($dados->complemento);
                $endereco->setId_cidade($dados->id_cidade);

                return $endereco;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de endereços
    /**
     * getEnderecos
     *
     * @return void
     */
    public function getEnderecos()
    {
        $sql = $this->pdo->prepare('select * from tb_enderecos');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $endereco = new Endereco();

                $endereco->setId($dados->id);
                $endereco->setLogradouro($dados->logradouro);
                $endereco->setBairro($dados->bairro);
                $endereco->setNumero($dados->numero);
                $endereco->setCep($dados->cep);
                $endereco->setComplemento($dados->complemento);
                $endereco->setId_cidade($dados->id_cidade);
                
                $lista[] = $endereco;
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
     * @param  mixed $endereco
     *
     * @return void
     */
    public function alterar(Endereco $endereco)
    {
        $sql = $this->pdo->prepare('update tb_enderecos set logradouro = :logradouro, bairro = :bairro, numero = :numero, cep = :cep, complemento = :complemento, id_cidade = :id_cidade where  id = :id');
        $sql->bindValue(':id', $endereco->getId());
        $sql->bindValue(':logradouro', $endereco->getLogradouro());
        $sql->bindValue(':bairro', $endereco->getBairro());
        $sql->bindValue(':numero', $endereco->getNumero());
        $sql->bindValue(':cep', $endereco->getCep());
        $sql->bindValue(':complemento', $endereco->getComplemento());
        $sql->bindValue(':id_cidade', $endereco->getId_cidade());
        
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
     * @param  mixed $endereco
     *
     * @return void
     */
    public function excluir(Endereco $endereco)
    {
        $sql = $this->pdo->prepare('delete from tb_enderecos where id = :id');
        $sql->bindValue(':id', $endereco->getId());
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