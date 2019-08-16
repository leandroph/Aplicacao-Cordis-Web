<?php

class AluguelDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Cliente $cliente, Produto $produto) {
        $sql = $this->pdo->prepare('INSERT INTO aluguel (id_cliente, id_produto, data_de_aluguel) VALUES (:id_cliente, :id_produto, :data_de_aluguel)');
        $sql->bindValue(':id_cliente', $cliente->getId());
        $sql->bindValue(':id_produto', $produto->getId());
        date_default_timezone_set('America/Sao_Paulo');
        $sql->bindValue(':data_de_aluguel', date('Y-m-d H:i:s'));
        // $sql->bindValue(':data_devolucao', $aluguel->getData_Devolucao());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Aluguel $aluguel) {
        $sql = $this->pdo->prepare('update aluguel set data_de_devolucao = :data_de_devolucao where id_aluguel = :id_aluguel');
        $sql->bindValue(':data_de_devolucao', $aluguel->getData_Devolucao());
        $sql->bindValue(':id_aluguel', $aluguel->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Cliente $cliente) {
        $sql = $this->pdo->prepare('delete from aluguel where id_cliente = :id_cliente');
        $sql->bindValue(':id', $cliente->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }


    public function getAluguel($id) {
        $sql = $this->pdo->prepare('select * from aluguel where id_aluguel = :id_aluguel');
        $sql->bindValue(':id_aluguel', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                 $aluguel = new Aluguel;
                
                $aluguel->setId($dados->id_aluguel);
                $aluguel->setId_Cliente($dados->id_cliente);
                $aluguel->setId_Produto($dados->id_produto);
                $aluguel->setData_Aluguel($dados->data_de_aluguel);
                $aluguel->setData_Devolucao($dados->data_de_devolucao);

                return $aluguel;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    public function getAlugueis_Cliente($id) {
        $sql = $this->pdo->prepare('select * from aluguel where id_cliente = :id_cliente');
        $sql->bindValue(':id_cliente', $id);

        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $aluguel = new Aluguel;
                
                $aluguel->setId($dados->id_aluguel);
                $aluguel->setId_Cliente($dados->id_cliente);
                $aluguel->setId_Produto($dados->id_produto);
                $aluguel->setData_Aluguel($dados->data_de_aluguel);
                $aluguel->setData_Devolucao($dados->data_de_devolucao);

                $lista[] = $aluguel;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }
    
    public function getAlugueis() {
        $sql = $this->pdo->prepare('select * from aluguel');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $aluguel = new Aluguel;
                
                $aluguel->setId($dados->id_aluguel);
                $aluguel->setId_Cliente($dados->id_cliente);
                $aluguel->setId_Produto($dados->id_produto);
                $aluguel->setData_Aluguel($dados->data_de_aluguel);
                $aluguel->setData_Devolucao($dados->data_de_devolucao);

                $lista[] = $aluguel;
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