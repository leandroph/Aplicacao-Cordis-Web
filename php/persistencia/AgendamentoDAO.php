<?php

class AgendamentoDAO {

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
     * @param  mixed $agendamento
     *
     * @return void
     */
    public function inserir(Agendamento $agendamento) {
        $sql = $this->pdo->prepare('INSERT INTO tb_agendamentos (id, data_hora_inicio, data_hora_fim, valor, observacao, senha, cod_status, pago, id_not_email, id_not_sms, id_convenio, id_exames_agendament, id_secretaria, id_paciente, id_medico) VALUES (:id, :data_hora_inicio, :data_hora_fim, :valor, :observacao, :senha, :cod_status, :pago, :id_not_email, :id_not_sms, :id_convenio, :id_exames_agendament, :id_secretaria, :id_paciente, :id_medico)');
        $sql->bindValues(':id', $agendamento->getId());
        $sql->bindValues(':data_hora_inicio', $agendamento->getDataHoraInicio());
        $sql->bindValues(':data_hora_fim', $agendamento->getDataHoraFim());
        $sql->bindValues(':valor', $agendamento->getValor());
        $sql->bindValues(':observacao', $agendamento->getObservacao());
        $sql->bindValues(':senha', $agendamento->getSenha());
        $sql->bindValues(':cod_Status', $agendamento->getCod_Status());
        $sql->bindValues(':pago', $agendamento->getPago());
        $sql->bindValues(':id_secretaria', $agendamento->getId_Secretaria());
        $sql->bindValues(':id_paciente', $agendamento->getId_Paciente());
        $sql->bindValues(':id_medico', $agendamento->getId_Medico());

        if($sql->execute()) {
            return true;
        } else {
            echo $sql->errorCode();
        }
    }
    
    /**
     * Excluir registro do banco
     *
     * @param  mixed $agendamento
     *
     * @return void
     */
    public function excluir(Agendamento $agendamento) {
        $sql = $this->pdo->prepare('delete from tb_administrador where id_usuario = :id');
        $sql->bindValue(':id', $agendamento->getId());

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
    public function getAgendamento($id) 
    {
        $sql = $this->pdo->prepare('select * from tb_agendamentos where id = :id');
        $sql->bindValues(':id', $id);
    
        $sql->execute();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendamento = new Agendamento();
    
                $agendamento->setId($dados->id);
                $agendamento->setDataHoraInicio($dados->data_hora_inicio);
                $agendamento->setDataHoraFim($dados->data_hora_fim);
                $agendamento->setValor($dados->valor);
                $agendamento->setObservacao($dados->observacao);
                $agendamento->setSenha($dados->senha);
                $agendamento->setCod_Status($dados->cod_status);
                $agendamento->setPago($dados->pago);
                $agendamento->setId_Secretaria($dados->id_secretaria);
                $agendamento->setId_Paciente($dados->id_paciente);
                $agendamento->setId_Medico($dados->id_medico);
                
    
                return $agendamento;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
    
    }
    
    /**
     * Seleciona todos registros do banco
     *
     * @return void
     */
    public function getAgendamentos() {
        $sql = $this->pdo->prepare('select * from tb_agendamentos');
        $sql->execute();
    
        $lista = array();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendamento = new Agendamento();
    
                $agendamento->setId($dados->id);
                $agendamento->setDataHoraInicio($dados->data_hora_inicio);
                $agendamento->setDataHoraFim($dados->data_hora_fim);
                $agendamento->setValor($dados->valor);
                $agendamento->setObservacao($dados->observacao);
                $agendamento->setSenha($dados->senha);
                $agendamento->setCod_Status($dados->cod_status);
                $agendamento->setPago($dados->pago);
                $agendamento->setId_Secretaria($dados->id_secretaria);
                $agendamento->setId_Paciente($dados->id_paciente);
                $agendamento->setId_Medico($dados->id_medico);
    
                $lista[] = $agendamento;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
        
        return $lista;
    }

    /**
     * Altera registro do banco
     *
     * @param Agendamento $agendamento
     * @return void
     */
    public function alterar(Agendamento $agendamento){
        $sql = $this->pdo->prepare('update tb_anexos set id = :id, data_hora_inicio = :data_hora_inicio, data_hora_fim = :data_hora_fim, valor = :valor, observacao = :observacao, senha = :senha, cod_status = :cod_status, pago = :pago, id_not_email = : id_not_email, id_not_sms = :id_not_sms, id_convenio = :id:convenio, id_exames_agendamento = :id_exames_agendamento, id_secretaria = :id_secretaria, id_paciente = :id_paciente, id_medico = :id_medico ');
        $sql->bindValues(':id', $agendamento->getId());
        $sql->bindValues(':data_hora_inicio', $agendamento->getDataHoraInicio());
        $sql->bindValues(':data_hora_fim', $agendamento->getDataHoraFim());
        $sql->bindValues(':valor', $agendamento->getValor());
        $sql->bindValues(':observacao', $agendamento->getObservacao());
        $sql->bindValues(':senha', $agendamento->getSenha());
        $sql->bindValues(':cod_Status', $agendamento->getCod_Status());
        $sql->bindValues(':pago', $agendamento->getPago());
        $sql->bindValues(':id_secretaria', $agendamento->getId_Secretaria());
        $sql->bindValues(':id_paciente', $agendamento->getId_Paciente());
        $sql->bindValues(':id_medico', $agendamento->getId_Medico());
        
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