<?php

class NotificacaoSmsDAO {

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
    public function inserir(NotificacaoSms $notificacaosms) 
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_cidades (id_notificacao, api_key) VALUES (:id_notificacao, :api_key)');
        $sql->bindValue(':id_notificacao', $notificacaosms->getId_Notificacao());
        $sql->bindValue(':api_key', $notificacaosms->getApi_Key());
        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
   
    // retorna apenas uma cidade
    /**
     * getCidade
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getNotificacaoSms($id_notificacao)
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes_sms where id = :id_notificacao');
        $sql->bindValue(':id_notificacao', $id_notificacao);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacaosms = new Cidade();

                $notificacaosms->setId_Notificacao($dados->id_notificacao);
                $notificacaosms->setApi_Key($dados->api_key);

                return $notificacaosms;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }

    // retorna uma lista de cidades
    /**
     * getCidades
     *
     * @return void
     */
    public function getNotificacoesSms()
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes_sms');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacaosms = new Cidade();

                $notificacaosms->setId_Notificacao($dados->id_notificacao);
                $notificacaosms->setApi_Key($dados->api_key);

                $lista[] = $notificacaosms;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }

        return $lista;
    }

    /**
     * alterar
     *
     * @param  mixed $cidade
     *
     * @return void
     */
    public function alterar(NotificacaoSms $notificacaosms)
    {
        $sql = $this->pdo->prepare('update tb_notificacoes_sms set id_notificacao= :id_notificacao, api_key = :api_key');
        $sql->bindValue(':id_notificacao', $notificacaosms->getId_Notificacao());
        $sql->bindValue(':api_key', $notificacaosms->getApi_Key());
        
        if ($sql->execute()) {
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
     * @param  mixed $cidade
     *
     * @return void
     */
    public function excluir(NotificacaoSms $notificacaosms)
    {
        $sql = $this->pdo->prepare('delete from tb_notificacoes_sms where id_notificacao = :id_notificacao');
        $sql->bindValue(':id_notificacao', $notificacaosms->getId_Notificacao());
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