<?php

class AgendaProntuarioDAO {

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
     * @param  mixed $agendaprontuario
     *
     * @return void
     */
    public function inserir(AgendaProntuario $agendaprontuario) {
        $sql = $this->pdo->prepare('INSERT INTO tb_agends_pronts (id, id_prontuario, id_agendamento) VALUES (:id, :id_agendamento, :id_agendamento)');
        $sql->bindValues(':id', $agendaprontuario->getId());]
        $sql->bindValues(':id_prontuario', $agendaprontuario->getIdProntuario());
        $sql->bindValues(':id_agendamento', $agendaprontuario->getIdAgendamento());
        if($sql->execute()) {
            return true;
        } else {
            echo $sql->errorCode();
        }
    }

    /**
     * excluir
     *
     * @param  mixed $agendaprontuario
     *
     * @return void
     */
    public function excluir(AgendaProntuario $agendaprontuario) {
        $sql = $this->pdo->prepare('delete from tb_agends_pronts where id = :id');
        $sql->bindValue(':id', $agendaprontuario->getIds());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * getAgendaProntuario
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getAgendaProntuario($id) {
        $sql = $this->prepare('select * from tb_agends_pronts where id = :id');
        $sql->bindValues(':id', $id);
    
        $sql->execute();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendaprontuario = new AgendaProntuario();
    
                $agendaprontuario->setId($dados->$id);
                $agendaprontuario->setId_Prontuario($dados->$id_prontuario);
                $agendaprontuario->setId_Agendamento($dados->$id_prontuario);
    
    
                return $administrador;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
    
    }
    
    /**
     * getAgendaProntuarios
     *
     * @return void
     */
    public function getAgendaProntuarios() {
        $sql = $this->prepare('select * from tb_agends_pronts');
        $sql->execute();
    
        $lista = array();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $agendaprontuario = new AgendaProntuario();
    
                $agendaprontuario->setId($dados->$id);
                $agendaprontuario->setId_Prontuario($dados->$id_prontuario);
                $agendaprontuario->setId_Agendamento($dados->$id_prontuario);
    
                $lista[] = $agendaprontuario;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
        
        return $lista;
    }

    public function alterar(AgendaProntuario $anexo){
        $sql = $this->pdo->prepare('update tb_agends_pronts set id = :id, id_prontuario = :id_prontuario, id_agendamento = :ig_agendamento');
        $sql->bindValues(':id', $agendaprontuario->getId());]
        $sql->bindValues(':id_prontuario', $agendaprontuario->getIdProntuario());
        $sql->bindValues(':id_agendamento', $agendaprontuario->getIdAgendamento());
        
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