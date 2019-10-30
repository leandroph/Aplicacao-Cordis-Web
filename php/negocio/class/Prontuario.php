<?php
class Prontuario
{
     /**Declaração de propriedade */
     private $id;
     private $nome;
     private $ativo;

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
}
