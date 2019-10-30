<?php

class AgendamentoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

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
        $sql->bindValues(':id_not_email', $agendamento->getIdNotEmail());
        $sql->bindValues(':id_not_sms', $agendamento->getIdNotSms());
        $sql->bindValues(':id_convenio', $agendamento->getId_Convenio());
        $sql->bindValues(':id_exames_agendamento', $agendamento->getId_Exames_Agendamento());
        $sql->bindValues(':id_secretaria', $agendamento->getId_Secretaria());
        $sql->bindValues(':id_paciente', $agendamento->getId_Paciente());
        $sql->bindValues(':id_medico', $agendamento->getId_Medico());

        if($sql->execute()) {
            return true;
        } else {
            echo $sql->errorCode();
        }
    }
    
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
    
    public function getAgendamento($id) {
        $sql = $this->prepare('select * from tb_agendamento where id = :id');
        $sql->bindValues(':id', $id);
    
        $sql->execute();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendamento = new Agendamento();
    
                $agendamento->setId($dados->$id);
                $agendamento->setDataHoraInicio($dados->$data_hora_inicio);
                $agendamento->setDataHoraFim($dados->$data_hora_fim);
                $agendamento->setValor($dados->$id);
                $agendamento->setObservacao($dados->$id);
                $agendamento->setSenha($dados->$id);
                $agendamento->setCod_Status($dados->$id);
                $agendamento->setPago($dados->$id);
                $agendamento->setIdNotEmail($dados->$id);
                $agendamento->setIdNotSms($dados->$id);
                $agendamento->setId_Convenio($dados->$id);
                $agendamento->setId_Exames_Agendamento($dados->$id);
                $agendamento->setId_Secretaria($dados->$id);
                $agendamento->setId_Paciente($dados->$id);
                $agendamento->setId_Medico($dados->$id);
                
    
                return $agendamento;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
    
    }
    
    public function getAgendamento() {
        $sql = $this->prepare('select * from tb_agendamentos');
        $sql->execute();
    
        $lista = array();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendamento = new Agendamento();
    
                $agendamento->setId($dados->$id);
                $agendamento->setDataHoraInicio($dados->$data_hora_inicio);
                $agendamento->setDataHoraFim($dados->$data_hora_fim);
                $agendamento->setValor($dados->$id);
                $agendamento->setObservacao($dados->$id);
                $agendamento->setSenha($dados->$id);
                $agendamento->setCod_Status($dados->$id);
                $agendamento->setPago($dados->$id);
                $agendamento->setIdNotEmail($dados->$id);
                $agendamento->setIdNotSms($dados->$id);
                $agendamento->setId_Convenio($dados->$id);
                $agendamento->setId_Exames_Agendamento($dados->$id);
                $agendamento->setId_Secretaria($dados->$id);
                $agendamento->setId_Paciente($dados->$id);
                $agendamento->setId_Medico($dados->$id);
    
                $lista[] = $agendamento;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
        
        return $lista;
    }

}

?>