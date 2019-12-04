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
     * Insere registro no banco
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
     * Exclui registro do banco
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
     * Seleciona um registro do banco
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
     * Seleciona todos registros do banco
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

    /**
     * Altera registro do banco
     *
     * @param Cliente $cliente
     * @return void
     */
    public function alterar(Cliente $cliente){
        $sql = $this->pdo->prepare('update tb_anexos set id = :id, nome = :nome, caminho = :caminho, id_agendamento = :id_agendamento');
        $sql->bindValue(':id', $anexo->getId());
        $sql->bindValue(':nome', $anexo->getNome());
        $sql->bindValue(':caminho', $anexo->getCaminho());
        $sql->bindValue(':id+usuario', $anexo->getId_Usuario());
        
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