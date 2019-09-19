<?php
class UsuarioPermissao
{
    /**Declaração de propriedade */
	private $id;
	private $id_usuario;
    private $id_permissao;
	
	/**Geters and Seters */

    /**
     * Set the value of id
     *
     * @return  self
     */
	public function setId($id){
		$this->id = $id;
	}
	
	/**
     * Get the value of id
     */ 
	public function getId(){
		return $this->id;
	}

    /**
     * Set the value of id usuario
     *
     * @return  self
     */
	public function setIdUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}
	
	/**
     * Get the value of id usuario
     */ 
	public function getIdUsuario(){
		return $this->id_usuario;
	}

    /**
     * Set the value of id permissao
     *
     * @return  self
     */
	public function setIdPermissao($id_permissao){
		$this->id_permissao = $id_permissao;
	}
	
	/**
     * Get the value of id permissao
     */ 
	public function getIdPermissao(){
		return $this->id_permissao;
    }

}