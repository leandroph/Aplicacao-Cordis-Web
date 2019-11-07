<?php

class NotificacaoEmailDAO {

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
    public function inserir(NotificacaEmail $notificacaoEmail)
    {
        $sql = $this->pdo->prepare('INSERT INTO tb_notificacoes_email (id_notificacao, email_remetente, servidor, porta, usuario, senha, cod_criptografia, email_oculto, email_copia) VALUES (:id_notificacao, :email_remetente, :servidor, :porta, :usuario, :senha, :cod_criptografia, :email_oculto, :email_copia)');
        $sql->bindValue(':id_notificacao', $notificacaoEmail->getIdNotificacao());
        $sql->bindValue(':email_remetente', $notificacaoEmail->getEmailRemetente());
        $sql->bindValue(':servidor', $notificacaoEmail->getServidor());
        $sql->bindValue(':porta', $notificacaoEmail->getPorta());
        $sql->bindValue(':usuario', $notificacaoEmail->getUsuario());
        $sql->bindValue(':senha', $notificacaoEmail->getSenha());
        $sql->bindValue(':cod_criptografia', $notificacaoEmail->getCriptografia());
        $sql->bindValue(':email_oculto', $notificacaoEmail->getEmailOculto());
        $sql->bindValue(':email_copia', $notificacaoEmail->getEmailCopia()); 

        if ($sql->execute()) {
            // Query succeeded.
            return true;
        } else {
            // Query failed.
            echo $sql->errorCode();
        }
    
    }
    
    // retorna apenas uma notificacao de email
    /**
     * getNotificacao
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getNotificacaoEmail($id)
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes_email where id = :id');
        $sql->bindValue(':id', $id);

        $sql->execute();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacaoEmail = new NotificacaoEmail();

                $notificacaoEmail->setIdNotificacao($dados->id_notificacao);
                $notificacaoEmail->setEmailRemetente($dados->email_remetente);
                $notificacaoEmail->setServidor($dados->servidor);
                $notificacaoEmail->setPorta($dados->porta);
                $notificacaoEmail->setUsuario($dados->usuario);
                $notificacaoEmail->setSenha($dados->senha);
                $notificacaoEmail->setCriptografia($dados->cod_criptografia);
                $notificacaoEmail->setEmailOculto($dados->email_oculto);
                $notificacaoEmail->setemailCopia($dados->email_copia);

                return $notificacaoEmail;
            }
        } else {
            // Query failed.
            echo $sql->errorCode();
            return null;
        }
    }
    
    // retorna uma lista de notificacoes de email
    /**
     * get
     *
     * @return void
     */
    public function getNotificacoesEmail()
    {
        $sql = $this->pdo->prepare('select * from tb_notificacoes_email');
        $sql->execute();

        $lista = array();

        if ($sql->execute()) {
            // Query succeeded.
            while ($dados = $sql->fetch(PDO::FETCH_OBJ)) {
                $notificacaoEmail = new NotificacaoEmail();

                $notificacaoEmail->setIdNotificacao($dados->id_notificacao);
                $notificacaoEmail->setEmailRemetente($dados->email_remetente);
                $notificacaoEmail->setServidor($dados->servidor);
                $notificacaoEmail->setPorta($dados->porta);
                $notificacaoEmail->setUsuario($dados->usuario);
                $notificacaoEmail->setSenha($dados->senha);
                $notificacaoEmail->setCriptografia($dados->cod_criptografia);
                $notificacaoEmail->setEmailOculto($dados->email_oculto);
                $notificacaoEmail->setemailCopia($dados->email_copia);


                $lista[] = $notificacaoEmail;
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
    public function alterar(NotificacaEmail $notificacaoEmail)
    {
        $sql = $this->pdo->prepare('update tb_notificacoes_email set id_notificacao = :id_notificacao, email_remetente = :email_remetente, servidor = :servidor, usuario = :usuario, senha = :senha, cod_criptografia = :cod_criptografia, email_oculto = :email_oculto, email_copia = :email_copia');
        $sql->bindValue(':id_notificacao', $notificacaoEmail->getIdNotificacao());
        $sql->bindValue(':email_remetente', $notificacaoEmail->getEmailRemetente());
        $sql->bindValue(':servidor', $notificacaoEmail->getServidor());
        $sql->bindValue(':porta', $notificacaoEmail->getPorta());
        $sql->bindValue(':usuario', $notificacaoEmail->getUsuario());
        $sql->bindValue(':senha', $notificacaoEmail->getSenha());
        $sql->bindValue(':cod_criptografia', $notificacaoEmail->getCriptografia());
        $sql->bindValue(':email_oculto', $notificacaoEmail->getEmailOculto());
        $sql->bindValue(':email_copia', $notificacaoEmail->getEmailCopia());
        
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
    public function excluir(NotificacaEmail $notificacaoEmail)
    {
        $sql = $this->pdo->prepare('delete from tb_notificacoes_email where id_notificacao = :id_notificacao');
        $sql->bindValue(':id_notificacao', $exame->getIdNotificacao());
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