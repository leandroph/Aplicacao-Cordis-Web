<?php
class Usuario
{
    /**Declaração de propriedade */
	private $id;
	private $login;
    private $senha;
    private $ativo;
	
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
     * Set the value of login
     *
     * @return  self
     */
	public function setLogin($login){
		$this->login = $login;
	}
	
	/**
     * Get the value of login
     */ 
	public function getLogin(){
		return $this->login;
	}

    /**
     * Set the value of senha
     *
     * @return  self
     */
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	/**
     * Get the value of senha
     */ 
	public function getSenha(){
		return $this->senha;
	}
	
    /**
     * Set the value of ativo
     *
     * @return  self
     */
    public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	/**
     * Get the value of ativo
     */ 
	public function getAtivo(){
		return $this->ativo;
	}

}