<?php

class AgendamentoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir() {
        $sql = $this->pdo->prepare('INSERT INTO tb_agendamentos (id, data_hora_inicio, data_hora_fim, valor, observacao, senha, cod_status, pago)
        VALUES (:id, :data_hora_inicio, :data_hora_fim, :valor, :observacao, :senha, :cod_status, :pago)');
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Agendamento $agendamento) {
        $sql = $this->pdo->prepare();
        //$sql->bindValue(':data_de_devolucao', $aluguel->getData_Devolucao());
        //$sql->bindValue(':id_aluguel', $aluguel->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Agendamento $agendamento) {
        $sql = $this->pdo->prepare('delete from tb_agendamentos where id = :id');
        //$sql->bindValue(':id', $cliente->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }


    public function getAgendamento($id) {
        $sql = $this->pdo->prepare('select * from tb_agendamentos where id = :id');
        //$sql->bindValue(':id_aluguel', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                //  $aluguel = new Aluguel;
                
                // $aluguel->setId($dados->id_aluguel);
                // $aluguel->setId_Cliente($dados->id_cliente);
                // $aluguel->setId_Produto($dados->id_produto);
                // $aluguel->setData_Aluguel($dados->data_de_aluguel);
                // $aluguel->setData_Devolucao($dados->data_de_devolucao);

                // return $aluguel;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    
    public function getAgendamentos() {
        $sql = $this->pdo->prepare('select * from tb_agendamentos');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendamento = new Agendamento;
                
                $agendamento->setId($dados->id);
                $agendamento->setDataHoraInicio($dados->data_hora_inicio);
                $agendamento->setDataHoraFim($dados->data_hora_fim);
                $agendamento->setValor($dados->valor);
                $agendamento->setObservacao($dados->observacao);
                $agendamento->setStatus($dados->cod_status);
                $agendamento->setPago($dados->pago);

                $lista[] = $agendamento;
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