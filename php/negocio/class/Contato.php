<?php
class Contato
{
    /**Declaração de propriedade */
     private $id_usuario;
     private $telefone;
     private $tipo;
	
     /**
      * getId_usuario
      *
      * @return void
      */
     public function getId_usuario()
     {
          return $this->id_usuario;
     }

     /**
      * setId_usuario
      *
      * @param  mixed $id_usuario
      *
      * @return void
      */
     public function setId_usuario($id_usuario)
     {
          $this->id_usuario = $id_usuario;

          return $this;
     }

     /**
      * getTelefone
      *
      * @return void
      */
     public function getTelefone()
     {
          return $this->telefone;
     }

     /**
      * setTelefone
      *
      * @param  mixed $telefone
      *
      * @return void
      */
     public function setTelefone($telefone)
     {
          $this->telefone = $telefone;

          return $this;
     }

     /**
      * getTipo
      *
      * @return void
      */
     public function getTipo()
     {
          return $this->tipo;
     }

     /**
      * setTipo
      *
      * @param  mixed $tipo
      *
      * @return void
      */
     public function setTipo($tipo)
     {
          $this->tipo = $tipo;

          return $this;
     }
}