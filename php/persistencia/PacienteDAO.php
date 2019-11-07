<?php

class PacienteDAO {

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
     * create
     *
     * @return void
     */
    public function inserir(Paciente $paciente) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_pacientes (id_usuario) VALUES (:id_usuario)');
        $sql->bindValue(':id', $paciente->getId_Usuario());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    // retorna apenas uma paciente
    /**
     * getPaciente
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getExame($id)
    {
        $sql = $this->pdo->prepare('select * from tb_pacientes where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $paciente = new Paciente();

                $paciente->setId($dados->id_usuario);

                return $paciente;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    // retorna uma lista de pacientes
    /**
     * getPacientes
     *
     * @return void
     */
    public function getPacientess()
    {
        $sql = $this->pdo->prepare('select * from tb_pacientes');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $paciente = new Paciente();

                $paciente->setId($dados->id_usuario);


                $lista[] = $paciente;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    /**
     * update
     *
     * @return void
     */
    public function alteras(Paciente $paciente)
    {
        $sql = $this->pdo->prepare('update tb_pacientes set id_usuario= :id_usuario');
        $sql->bindValue(':id_usuario', $paciente->getId_Usuario());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }
    
    /**
     * delete
     *
     * @return void
     */
    public function excluir(Paciente $paciente)
    {
        $sql = $this->pdo->prepare('delete from tb_pacientes where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $paciente->getId_Usuario());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }

}
