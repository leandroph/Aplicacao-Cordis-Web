<?php
class Contato
{
    /**Declaração de propriedade */
     private $id_usuario;
     private $telefone;
     private $tipo;
	

     /**
      * Get the value of id_usuario
      */ 
     public function getId_usuario()
     {
          return $this->id_usuario;
     }

     /**
      * Set the value of id_usuario
      *
      * @return  self
      */ 
     public function setId_usuario($id_usuario)
     {
          $this->id_usuario = $id_usuario;

          return $this;
     }

     /**
      * Get the value of telefone
      */ 
     public function getTelefone()
     {
          return $this->telefone;
     }

     /**
      * Set the value of telefone
      *
      * @return  self
      */ 
     public function setTelefone($telefone)
     {
          $this->telefone = $telefone;

          return $this;
     }

     /**
      * Get the value of tipo
      */ 
     public function getTipo()
     {
          return $this->tipo;
     }

     /**
      * Set the value of tipo
      *
      * @return  self
      */ 
     public function setTipo($tipo)
     {
          $this->tipo = $tipo;

          return $this;
     }
}