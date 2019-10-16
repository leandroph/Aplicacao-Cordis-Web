<?php

class PreferenciaDAO
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Preferencia $preferencia)
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_preferencias (id_usuario, pref_skin, filtro_paciente, filtro_medico, filtro_secretaria, filtor_administrador) VALUES (:id_usuario, :pref_skin, :filtro_paciente, :filtro_medico, :filtro_secretaria, :filtor_administrador)');
        $sql->bindValue(':id_usuario', $preferencia->getId_Usuario());
        $sql->bindValue(':pref_skin', $preferencia->getPref_Skin());
        $sql->bindValue(':filtro_paciente', $preferencia->getFiltro_Paciente());
        $sql->bindValue(':filtro_medico', $preferencia->getFiltro_Medico());
        $sql->bindValue(':filtro_secretaria', $preferencia->getFiltro_Secretaria());
        $sql->bindValue(':filtro_administrador', $preferencia->getFiltro_Administrador());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Preferencia $preferencia)
    {
        $sql = $this->pdf->prepare('delet from tb_preferencias where id_usuario = :id');
        $sql->bindValue(':id', $preferencia->getId_Usuario());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Preferencia $preferencia) {
        $sql = $this->pdo->prepare('update tb_preferencias set id_usuario = :id_usuario, pref_skin = :pref_skin, filtro_paciente = :filtro_paciente, filtro_medico = :filtro_medico, filtro_secretaria = :filtro_secretaria, filtro_administrador = :filtro_administrador where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $preferencia->getNome());
        $sql->bindValue(':pref_skin', $preferencia->getlogin());
        $sql->bindValue(':filtro_paciente', md5($preferencia->getSenha()));
        $sql->bindValue(':filtro_medico', $preferencia->getId());
        $sql->bindValue(':filtro_secretaria', $preferencia->getId());
        $sql->bindValue(':filtro_administrador', $preferencia->getId());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getPreferencia($id)
    {
        $sql = $this->pdo->prepare('select * from tb_preferencias where id_usuario = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $preferencia = new Preferencia();

                $preferencia->setId_Usuario($dados->id_usuario);
                $preferencia->setPref_Skin($dados->pref_skin);
                $preferencia->setFiltro_Paciente($dados->filtro_paciente);
                $preferencia->setFiltro_Medico($dados->filtro_medico);
                $preferencia->setFiltro_Secretaria($dados->filtro_secretaria);
                $preferencia->setFiltro_Administrador($dados->filtro_administrador);

                return $preferencia;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    public function getPreferencias()
    {
        $sql = $this->pdf->prepare('select * from tb_preferencias');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $preferencia = new Preferencia();

                $preferencia->setId_Usuario($dados->id_usuario);
                $preferencia->setPref_Skin($dados->pref_skin);
                $preferencia->setFiltro_Paciente($dados->filtro_paciente);
                $preferencia->setFiltro_Medico($dados->filtro_medico);
                $preferencia->setFiltro_Secretaria($dados->filtro_secretaria);
                $preferencia->setFiltro_Administrador($dados->filtro_administrador);

                $lista[] = $preferencia;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        return $lista;
    }
}
