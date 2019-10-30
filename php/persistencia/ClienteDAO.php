<?php

class ClienteDAO {

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
     * @param  mixed $pessoa
     *
     * @return void
     */
    public function inserir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('INSERT INTO cliente (id_pessoa) VALUES (:id_pessoa)');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
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
     * @param  mixed $pessoa
     *
     * @return void
     */
    public function excluir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('delete from cliente where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * getCliente
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getCliente($id) {
        $sql = $this->pdo->prepare('select * from cliente where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $cliente = new Cliente();
                
                $cliente->setId($dados->id_cliente);
                $cliente->setId_Pessoa($dados->id_pessoa);

                return $cliente;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    /**
     * getClientes
     *
     * @return void
     */
    public function getClientes() {
        $sql = $this->pdo->prepare('select * from cliente');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $cliente = new Cliente;
                
                $cliente->setId($dados->id_cliente);
                $cliente->setId_Pessoa($dados->id_pessoa);

                $lista[] = $clientes;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }

}

?>