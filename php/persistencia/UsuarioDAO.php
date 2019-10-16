<?php

class UsuarioDAO
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Usuario $usuario)
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_usuarios (id, login, senha, ativo, perm_paciente, perm_medico, perm_secretaria, perm_administrador) VALUES (:id, :login, :ativo, :perm_paciente, :perm_medico, :perm_secretaria, :perm_administrador)');
        $sql->bindValue(':id', $usuario->getId());
        $sql->bindValue(':login', $usuario->getLogin());
        $sql->bindValue(':senha', $usuario->getSenha());
        $sql->bindValue(':ativo', $usuario->getAtivo());
        $sql->bindValue(':perm_paciente', $usuario->getPerm_Paciente());
        $sql->bindValue(':perm_medico', $usuario->getPerm_Medico());
        $sql->bindValue(':perm_secretaria', $usuario->getPerm_Secretaria());
        $sql->bindValue(':perm_administrador', $usuario->getPerm_Administrador());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }


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

    public function getPessoa($id)
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
                $usuario->setPerm_Administrador($dados->perm_paciente);
                $usuario->setPerm_Medico($dados->perm_medico);
                $usuario->setPerm_Paciente($dados->perm_secretaria);
                $usuario->setPerm_Secretaria($dados->perm_administrador);

                return $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    public function getPessoas()
    {
        $sql = $this->pdo->prepare('select * from pessoas');
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
                $usuario->setPerm_Administrador($dados->perm_paciente);
                $usuario->setPerm_Medico($dados->perm_medico);
                $usuario->setPerm_Paciente($dados->perm_secretaria);
                $usuario->setPerm_Secretaria($dados->perm_administrador);

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
