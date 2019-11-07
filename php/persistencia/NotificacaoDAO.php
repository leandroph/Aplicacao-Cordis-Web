<?php

class NotificacaoDAO {

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
    public function inserir(Notificacao $notificacao) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_notificacoes (id, nome, ativo, textoTrocaStatus, textoConfirmacao, nomeRemetente) VALUES ( (:id, :nome, :ativo, :textoTrocaStatus, :textoConfirmacao, :nomeRemetente)');
        $sql->bindValue(':id', $cidade->getId());
        $sql->bindValue(':nome', $cidade->getNome());
        $sql->bindValue(':ativo', $cidade->getAtivo());
        $sql->bindValue(':textoTrocaStatus', $cidade->getTextoTrocaStatus());
        $sql->bindValue(':textoConfirmacao', $cidade->getTextoConfirmacacao());
        $sql->bindValue(':nomeRementete', $cidade->getNomeRemetente());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    /**
     * read
     *
     * @return void
     */
    public function getNotificacao($id)
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacao = new Notificacao();

                $notificacao->setId($dados->id);
                $notificacao->setNome($dados->nome);
                $notificacao->setAtivo($dados->ativo);
                notificacao->setTextoTrocaStatus($dados->textoTrocasStatus);
                notificacao->setTextoConfirmacao($dados->textoConfirmacao);
                notificacao->setRemetente($dados->nomeRemetente);

                return $notificacao;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function getNotificacoes()
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacao = new Notificacao();

                $notificacao->setId($dados->id);
                $notificacao->setNome($dados->nome);
                $notificacao->setAtivo($dados->ativo);
                notificacao->setTextoTrocaStatus($dados->textoTrocasStatus);
                notificacao->setTextoConfirmacao($dados->textoConfirmacao);
                notificacao->setRemetente($dados->nomeRemetente);


                $lista[] = $notificacao;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    
    /**
     * delete
     *
     * @return void
     */
    public function alterar(Notificacao $notificacao)
    {
        $sql = $this->pdo->prepare('update tb_notificacoes set id= :id, nome = :nome, ativo = :ativo, textoTrocaStatus = :textoTrocaStatus, textoConfirmacacao = :textoConfirmacao, nomeRemetente = :nomeRemetente');
        $sql->bindValue(':id', $notificacao->getId());
        $sql->bindValue(':nome', $notificacao->getNome());
        $sql->bindValue(':ativo', $notificacao->getAtivo());
        $sql->bindValue(':textoTrocaStatus', $notificacao->getTextoTrocaStatus());
        $sql->bindValue(':textoConfirmacao', $notificacao->getTextoConfirmacao());
        $sql->bindValue(':nomeRemetente', $notificacao->getNomeRemetente());
        
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }

    }

    public function excluir(Notificacao $notificacao)
    {
        $sql = $this->pdo->prepare('delete from tb_notificacoes where id = :id');
        $sql->bindValue(':id', $notificacao->getId());
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