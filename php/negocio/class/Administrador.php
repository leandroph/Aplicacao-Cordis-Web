<?php
class Administrador
{
    /**Declaração de propriedade */
	private $id_usuario;
	
	/**Geters and Seters */

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId_Usuario($id_usuario){
     $this->id_usuario = $id_usuario;
     }

/**
* Get the value of id
*/ 
     public function getId_Usuario(){
     return $this->id_usuario;
     }
}