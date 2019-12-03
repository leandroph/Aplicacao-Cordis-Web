<?php

class UsuarioDAO
{

    private $pdo;

    /**
     * __construct
     *
     * @param  mixed $pdo
     *
     * @return void
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * inserir
     *
     * @param  mixed $usuario
     *
     * @return void
     */
    public function inserir(Usuario $usuario)
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_usuarios (login, senha, ativo, perm_paciente, perm_medico, perm_secretaria, perm_administrador) VALUES (:login, :senha, :ativo, :perm_paciente, :perm_medico, :perm_secretaria, :perm_administrador)');
        $sql->bindValue(':login', $usuario->getLogin());
        $sql->bindValue(':senha', $usuario->getSenha());
        $sql->bindValue(':ativo', $usuario->getAtivo());
        $sql->bindValue(':perm_paciente', $usuario->getPerm_Paciente());
        $sql->bindValue(':perm_medico', $usuario->getPerm_Medico());
        $sql->bindValue(':perm_secretaria', $usuario->getPerm_Secretaria());
        $sql->bindValue(':perm_administrador', $usuario->getPerm_Administrador());
        if ($sql->execute()) {
            $usuario->setId($this->pdo->lastInsertId());
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
     * @param  mixed $usuario
     *
     * @return void
     */
    public function excluir(Usuario $usuario)
    {
        $sql = $this->pdo->prepare('delete from tb_usuarios where id = :id');
        $sql->bindValue(':id', $usuario->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * getUsuario
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getUsuario($id)
    {
        $sql = $this->pdo->prepare('select * from tb_usuarios where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario();

                $usuario->setId($dados->id);
                $usuario->setLogin($dados->login);
                $usuario->setSenha($dados->senha);
                $usuario->setAtivo($dados->ativo);
                $usuario->setPerm_Administrador($dados->perm_administrador);
                $usuario->setPerm_Medico($dados->perm_medico);
                $usuario->setPerm_Paciente($dados->perm_paciente);
                $usuario->setPerm_Secretaria($dados->perm_secretaria);

                return $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    /**
     * getUsuarios
     *
     * @return void
     */
    public function getUsuarios()
    {
        $sql = $this->pdo->prepare('select * from tb_usuarios');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario();

                $usuario->setId($dados->id);
                $usuario->setLogin($dados->login);
                $usuario->setSenha($dados->senha);
                $usuario->setAtivo($dados->ativo);
                $usuario->setPerm_Administrador($dados->perm_administrador);
                $usuario->setPerm_Medico($dados->perm_medico);
                $usuario->setPerm_Paciente($dados->perm_paciente);
                $usuario->setPerm_Secretaria($dados->perm_secretaria);

                $lista[] = $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }
}
