<?php

class MedicoDAO {

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
     * @param  mixed $medico
     *
     * @return void
     */
    public function inserir(Medico $medico) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_medicos (id_usuario, cor_agenda, crm, especialidade, ativo) VALUES (:id_usuario, :cor_agenda, :crm, :especialidade, :ativo)');
        $sql->bindValue(':id_usuario', $medico->getId_usuario());
        $sql->bindValue(':cor_agenda', $medico->getCorAgenda());
        $sql->bindValue(':crm', $medico->getCrm());
        $sql->bindValue(':especialidade', $medico->getEspecialidade());
        $sql->bindValue(':ativo', $medico->getAtivo());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }
   
    // retorna apenas um medico
    /**
     * Seleciona um registro do banco
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getMedico($id)
    {
        $sql = $this->pdo->prepare('select * from tb_medicos where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $medico = new Medico();

                $medico->setId_usuario($dados->id_usuario);
                $medico->setCorAgenda($dados->cor_agenda);
                $medico->setCrm($dados->crm);
                $medico->setEspecialidade($dados->especialidade);
                $medico->setAtivo($dados->ativo);

                return $medico;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de medicos
    /**
     * Seleciona todos registros do banco
     *
     * @return void
     */
    public function getMedicos()
    {
        $sql = $this->pdo->prepare('select * from tb_medicos');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $medico = new Medico();

                $medico->setId_usuario($dados->id_usuario);
                $medico->setCorAgenda($dados->cor_agenda);
                $medico->setCrm($dados->crm);
                $medico->setEspecialidade($dados->especialidade);
                $medico->setAtivo($dados->ativo);

                $lista[] = $medico;
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
     * @param  mixed $medico
     *
     * @return void
     */
    public function alterar(Medico $medico)
    {
        $sql = $this->pdo->prepare('update tb_medicos set id_usuario = :id_usuario, cor_agenda = :cor_agenda, crm = :crm, especialidade = :especialidade, ativo = :ativo');
        $sql->bindValue(':id_usuario', $preferencia->getId_usuario());
        $sql->bindValue(':cor_agenda', $preferencia->getCorAgenda());
        $sql->bindValue(':crm', $preferencia->getCrm());
        $sql->bindValue(':especialidade', $preferencia->getEspecialidade());
        $sql->bindValue(':ativo', $preferencia->getAtivo());
        
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
     * @param  mixed $medico
     *
     * @return void
     */
    public function delete(Medico $medico)
    {
        $sql = $this->pdo->prepare('delete from tb_medicos where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $contato->getId_usuario());
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