<?php

class UsuarioDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Usuario $usuario, Pessoa $pessoa) {
        $sql = $this->pdo->prepare('INSERT INTO usuario (id_pessoa, usuario, senha) VALUES (:id_pessoa, :usuario, :senha)');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        $sql->bindValue(':usuario', $usuario->getLogin());
        $sql->bindValue(':senha', md5($usuario->getSenha()));
        if ($sql->execute()) {
            $usuario->setId($this->pdo->lastInsertId());
            return true;
        } else {
            $usuario->setId($this->pdo->lastInsertId());
            echo $sql->errorCode();
        }
    }

    public function alterar(Usuario $usuario, Pessoa $pessoa) {
        $sql = $this->pdo->prepare('update usuario set usuario = :usuario, senha = :senha where id_pessoa = :id_pessoa');
        $sql->bindValue(':usuario', $usuario->getLogin());
        $sql->bindValue(':senha', md5($usuario->getSenha()));
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Pessoa $pessoa) {
        $sql = $this->pdo->prepare('delete from usuario where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $pessoa->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getUsuario($id) {
        $sql = $this->pdo->prepare('select * from usuario where id_pessoa = :id_pessoa');
        $sql->bindValue(':id_pessoa', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario;
                
                $usuario->setId($dados->id_usuario);
                $usuario->setId_Pessoa($dados->id_pessoa);
                $usuario->setLogin($dados->usuario);
                $usuario->setSenha($dados->senha);

                return $usuario;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    public function getUsuarios() {
        $sql = $this->pdo->prepare('select * from usuario');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario;
                
                $usuario->setId($dados->id_usuario);
                $usuario->setId_Pessoa($dados->id_pessoa);
                $usuario->setLogin($dados->usuario);
                $usuario->setSenha($dados->senha);

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

?>