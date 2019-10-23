<?php

class EnderecoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

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
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        } 
    }
    $id;
	
    // retorna apenas um endereço
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

    public function alterar(Endereco $endereco)
    {
        $sql = $this->pdo->prepare('update tb_enderecos set id = :id, logradouro = :logradouro, bairro = :bairro, numero = :numero, cep = :cep, complemento = :complemento, id_cidade = :id_cidade');
        $sql->bindValue(':id', $preferencia->getId());
        $sql->bindValue(':logradouro', $preferencia->getLogradouro());
        $sql->bindValue(':bairro', $preferencia->getBairro());
        $sql->bindValue(':numero', $preferencia->getNumero());
        $sql->bindValue(':cep', $preferencia->getCep());
        $sql->bindValue(':complemento', $preferencia->getComplemento());
        $sql->bindValue(':id_cidade', $preferencia->getId_cidade());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }
    
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