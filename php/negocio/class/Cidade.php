<?php
class Cidade
{
    /**Declaração de propriedade */
	private $id;
	private $nome;
	
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
     * Get the value of nome
     */ 
	public function getId(){
		return $this->id;
	}

	/**
     * Set the value of nome
     *
     * @return  self
     */ 
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	/**
     * Get the value of nome
     */ 
	public function getNome(){
		return $this->nome;
	}

}