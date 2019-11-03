<?php

class AnexoDAO {

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
    public function inserir(Anexo $anexo) {
        $sql = $this->pdo->prepare('INSERT INTO tb_anexos (id, nome, caminho, id_agendamento) VALUES (:id, :nome, :caminho, :id_agendamento)');
        $sql->bindValues(':id', $Anexo->getId());
        $sql->bindValues(':nome', $Anexo->getNome());
        $sql->bindValues(':Caminho', $Anexo->getCaminho());
        $sql->bindValues(':id_agendamento', $Anexo->getId+Agendamento());
        if($sql->execute()) {
            return true;
        } else {
            echo $sql->errorCode();
        }
    }
    
    /**
     * read
     *
     * @return void
     */
    public function excluir(Anexo $anexo) {
        $sql = $this->pdo->prepare('delete from tb_anexos where id = :id');
        $sql->bindValue(':id', $anexo->getI());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function getAnexo($id) {
        $sql = $this->prepare('select * from tb_anexo where id = :id');
        $sql->bindValues(':id', $id);
    
        $sql->execute();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $anexp = new Anexo();
    
                $anexo->setId($dados->$id);
                $anexo->setNome($dados->$nome);
                $anexo->setCaminho($dados->$caminho);
                $anexo->setId_Agendamento($dados->$id_agendamento);

    
                return $anexo;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
    
    }
    
    /**
     * delete
     *
     * @return void
     */
    public function getAnexos() {
        $sql = $this->prepare('select * from tb_anexos');
        $sql->execute();
    
        $lista = array();
    
        if($sql->execute()) {
            while($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $anexo = new Anexo();
    
                $anexo->setId($dados->$id);
                $anexo->setNome($dados->$nome);
                $anexo->setCaminho($dados->$caminho);
                $anexo->setId_Agendamento($dados->$id_agendamento);
    
                $lista[] = $anexo;
            }
        } else {
            echo $sql->erroCode();
            return null;
        }
        
        return $lista;
    }

    public function alterar(Anexo $anexo){
        $sql = $this->pdo->prepare('update tb_anexos set id = :id, nome = :nome, caminho = :caminho, id_agendamento = :id_agendamento');
        $sql->bindValue(':id', $anexo->getId());
        $sql->bindValue(':nome', $anexo->getNome());
        $sql->bindValue(':caminho', $anexo->getCaminho());
        $sql->bindValue(':id+usuario', $anexo->getId_Usuario());
        
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