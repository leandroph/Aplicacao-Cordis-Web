<?php

class AdministradorDAO {

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
 * @param  mixed $administrador
 *
 * @return void
 */
public function inserir(Administrador $administrador) {
    $sql = $this->pdo->prepare('INSERT INTO tb_administradores (id_usuario) VALUES (:id_usuario)');
    $sql->bindValues(':id_usuario', $pessoa->getId_Usuario());
    if($sql->execute()) {
        return true;
    } else {
        echo $sql->errorCode();
    }
}

/**
 * excluir
 *
 * @param  mixed $administrador
 *
 * @return void
 */
public function excluir(Administrador $administrador) {
    $sql = $this->pdo->prepare('delete from tb_administrador where id_usuario = :id');
    $sql->bindValue(':id', $administrador->getId_Usuario());
    if ($sql->execute()) {
        // Query succeeded.
        return true;
    } else {
        // Query failed.
        echo $sql->errorCode();
    }
}

/**
 * getAdministrador
 *
 * @param  mixed $id
 *
 * @return void
 */
public function getAdministrador($id) {
    $sql = $this->prepare('select * from tb_administradores where id_usuario = :id');
    $sql->bindValues(':id', $id);

    $sql->execute();

    if($sql->execute()) {
        while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
            $administrador = new Administrador();

            $administrador->setId_Usuario($dados->$id_usuario);

            return $administrador;
        }
    } else {
        echo $sql->erroCode();
        return null;
    }

}

/**
 * getAdministradores
 *
 * @return void
 */
public function getAdministradores() {
    $sql = $this->prepare('select * from tb_administradores');
    $sql->execute();

    $lista = array();

    if($sql->execute()) {
        while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
            $administrador = new Administrador();

            $administrador->setId_Usuario($dados->$id_usuario);

            $lista[] = $administrador;
        }
    } else {
        echo $sql->erroCode();
        return null;
    }
    
    return $lista;
}

public function alterar(Administrador $administrador){
    $sql = $this->pdo->prepare('update tb_administradores set id_usuario = :id_usuario');
    $sql->bindValue(':id_usuario', $anexo->getId_Usuario());
    
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