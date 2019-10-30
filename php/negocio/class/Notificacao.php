<?php
class Notificacao
{
     /**Declaração de propriedade */
     private $id;
     private $nome;
     private $ativo;
     private $textoTrocaStatus;
     private $textoConfirmacao;
     private $nomeRemetente;

     /**Geters and Seters */

     /**
      * setId
      *
      * @param  mixed $id
      *
      * @return void
      */
     public function setId($id)
     {
          $this->id = $id;
     }

     /**
      * getId
      *
      * @return void
      */
     public function getId()
     {
          return $this->id;
     }

     /**
      * setNome
      *
      * @param  mixed $nome
      *
      * @return void
      */
     public function setNome($nome)
     {
          $this->nome = $nome;
     }

     /**
      * getNome
      *
      * @return void
      */
     public function getNome()
     {
          return $this->nome;
     }

     /**
      * setAtivo
      *
      * @param  mixed $ativo
      *
      * @return void
      */
     public function setAtivo($ativo)
     {
          $this->ativo = $ativo;
     }

     /**
      * getAtivo
      *
      * @return void
      */
     public function getAtivo()
     {
          return $this->ativo;
     }

     /**
      * setTextoTrocaStatus
      *
      * @param  mixed $textoTrocaStatus
      *
      * @return void
      */
     public function setTextoTrocaStatus($textoTrocaStatus)
     {
          $this->textoTrocaStatus = $textoTrocaStatus;
     }

     /**
      * getTextoTrocaStatus
      *
      * @return void
      */
     public function getTextoTrocaStatus()
     {
          return $this->textoTrocaStatus;
     }

     /**
      * setTextoConfirmacao
      *
      * @param  mixed $textoConfirmacao
      *
      * @return void
      */
     public function setTextoConfirmacao($textoConfirmacao)
     {
          $this->textoConfirmacao = $textoConfirmacao;
     }

     /**
      * getTextoConfirmacao
      *
      * @return void
      */
     public function getTextoConfirmacao()
     {
          return $this->textoConfirmacao;
     }

     /**
      * setNomeRemetente
      *
      * @param  mixed $nomeRemetente
      *
      * @return void
      */
     public function setNomeRemetente($nomeRemetente)
     {
          $this->nomeRemetente = $nomeRemetente;
     }

     /**
      * getNomeRemetente
      *
      * @return void
      */
     public function getNomeRemetente()
     {
          return $this->nomeRemetente;
     }
}
