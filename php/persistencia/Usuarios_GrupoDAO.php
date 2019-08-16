<?php

class Usuarios_GrupoDAO {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function inserir(Grupo $grupo, Usuario $usuario) {
        $sql = $this->pdo->prepare('INSERT INTO usuarios_grupo (id_grupo, id_usuario) VALUES (:id_grupo, :id_usuario)');
        $sql->bindValue(':id_grupo', $grupo->getId());
        $sql->bindValue(':id_usuario', $usuario->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function alterar(Grupo $grupo, Usuario $usuario) {
        $sql = $this->pdo->prepare('update usuarios_grupo set id_grupo = :id_grupo where id_usuario = :id_usuario');
        $sql->bindValue(':id_grupo', $grupo->getId());
        $sql->bindValue(':id_usuario', $usuario->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function excluir(Usuario $usuario) {
        $sql = $this->pdo->prepare('delete from usuarios_grupo where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $usuario->getId());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    public function getUsuario_Grupo($id) {
        $sql = $this->pdo->prepare('select * from usuarios_grupo where id_usuario = :id_usuario');
        $sql->bindValue(':id_usuario', $id);
        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuarios_grupo = new Usuarios_Grupo;
                
                $usuarios_grupo->setId_Grupo($dados->id_grupo);

                return $usuarios_grupo;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    public function getUsuarios_Grupo($id) {
        $sql = $this->pdo->prepare('select * from usuarios_grupo where id_grupo = :id_grupo');
        $sql->bindValue(':id_grupo', $id);
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuarios_grupo = new Usuarios_Grupo;
                
                $usuarios_grupo->setId_Usuario($dados->id_usuario);

                $lista[] = $usuarios_grupo;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
        
        return $lista;
    }
    
    public function getUsuarios_Grupos() {
        $sql = $this->pdo->prepare('select * from usuarios_grupo');
        $sql->execute();
        
        $lista = array();
        
        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $usuarios_grupo = new Usuarios_Grupo;
                
                $usuarios_grupo->setId_Grupo($dados->id_grupo);

                $lista[] = $usuarios_grupo;
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